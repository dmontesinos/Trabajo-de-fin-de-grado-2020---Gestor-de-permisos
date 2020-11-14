<?php
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once 'DataSource.php';
$servidor = "localhost"; $usuario = "root"; $contrasenia = "q1w2e3r4"; $database = "gestor_permisos";
$db = new DataSource();
$conn = $db->getConnection();
require_once ('./vendor/autoload.php');

if (isset($_POST["import"])) {

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'uploads/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        $conexion = new PDO("mysql:host=$servidor;dbname=$database;charset=UTF8", $usuario, $contrasenia);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        // Comienzo consultar si el año académico existe
        $anioAcademico = explode("/", $spreadSheetAry[1][1]);

        //echo "Any acadèmic: ".$anioAcademico[0]."<br/>"; //Año académico del documento

        $consultaExiste = $conexion->prepare('SELECT * FROM anio WHERE inicio = :inicio');
        $parametrosExiste = [
          'inicio' => $anioAcademico[0],
        ];
        $consultaExiste->execute($parametrosExiste);
        $consultaExiste = $consultaExiste->fetchAll(PDO::FETCH_ASSOC);

        // Comprobamos si el año académico ya existe o sino lo agregamos
        if(empty($consultaExiste)){
          $consulta = $conexion->prepare('INSERT INTO anio (inicio) VALUES (:inicio)');
          $parametros = [
            'inicio' => $anioAcademico[0],
          ];

          $consulta->execute($parametros);
        } else {
          echo "El curso académico ya existe.<br/>";
        }
        // FIN CONSULTAR AÑO ACADEMICO
        // Comienzo consultar si el plan académico existe
        $planAcademico = explode(" - ", $spreadSheetAry[2][0]);
        //echo "Pla acadèmic: ".$planAcademico[1]."<br/>"; //Plan académico del documento
        $idPlan = explode(" ", $planAcademico[0]);
        //echo "ID pla acadèmic: ".$idPlan[1]."<br/>"; //ID Plan académico del documento
        $tipoPlan = explode(" ", $planAcademico[1]);
        //echo "Tipus de pla: ".$tipoPlan[0]."<br/>"; //Tipus de pla
        $idCentroPlan = explode(" - ", $spreadSheetAry[1][5]);
        //echo "ID centro del plan: ".$idCentroPlan[0]."<br/>"; //ID centro plan


        $consultaExiste = $conexion->prepare('SELECT * FROM estudios WHERE idEstudio = :id');
        $parametrosExiste = [
          'id' => $idPlan[1],
        ];
        $consultaExiste->execute($parametrosExiste);
        $consultaExiste = $consultaExiste->fetchAll(PDO::FETCH_ASSOC);

        if(empty($consultaExiste)){
          $consulta = $conexion->prepare('INSERT INTO estudios (idEstudio, nombre, Centros_idCentros, activo, tipo) VALUES (:id, :nombre, :centro, :activo, :tipo)');
          $parametros = [
            'id' => $idPlan[1],
            'nombre' => $planAcademico[1],
            'centro' => $idCentroPlan[0],
            'activo' => 1,
            'tipo' => $tipoPlan[0],
          ];
          $consulta->execute($parametros);
        } else {
          echo "El estudio ya existe.<br/>";
        }





        /*
        A partir de aquí se deben añadir las asignaturas, profesores, grupos, etc
        mediante el bucle de las 274 iteraciones.
        Poner todas las comprobaciones en funciones para llamarlas desde el flujo
        principal!!!
        */

        for($i=6; $i<sizeof($spreadSheetAry)-1; $i++){
          // Comprobación de si existe la asignatura
          $consultaExiste = $conexion->prepare('SELECT idAsignaturas FROM Asignaturas WHERE idAsignaturas = :id');
          $parametrosExiste = [
            'id' => $spreadSheetAry[$i][0],
          ];
          $consultaExiste->execute($parametrosExiste);
          $consultaExiste = $consultaExiste->fetchAll(PDO::FETCH_ASSOC);

          if(empty($consultaExiste)){
            $consulta = $conexion->prepare('INSERT INTO Asignaturas (idAsignaturas, nombre) VALUES (:id, :nombre)');
            $parametros = [
              'id' => $spreadSheetAry[$i][0],
              'nombre' => $spreadSheetAry[$i][1],
            ];
            $consulta->execute($parametros);
          }
          // Fin comprobacion Asignaturas


          // Comprobación de si existe el profesor
          if($spreadSheetAry[$i][27] != ""){
            $consultaExiste = $conexion->prepare('SELECT niu FROM Profesores WHERE niu = :niu');
            $parametrosExiste = [
              'niu' => $spreadSheetAry[$i][27],
            ];
            $consultaExiste->execute($parametrosExiste);
            $consultaExiste = $consultaExiste->fetchAll(PDO::FETCH_ASSOC);

            // Gestión nombre profesor
            // PROBLEMAS CON PROFESORES COMO DOLORES ISABEL REXACHS DEL ROSARIO (el "del" del apellido no lo gestiono)
            $profesor = explode(", ", $spreadSheetAry[$i][28]);
            $apellidos = explode(" ", $profesor[0]);
            //echo "</br>Nom: ".$profesor[1]."<br/>";
            //echo "Primer cognom: ".$apellidos[0]."<br/>";
            //echo "Segon cognom: ".$apellidos[1]."<br/>";


            if(empty($consultaExiste)){
              $consulta = $conexion->prepare('INSERT INTO Profesores (niu, nombre, apellido1, apellido2) VALUES (:niu, :nombre, :apellido1, :apellido2)');
              $parametros = [
                'niu' => $spreadSheetAry[$i][27],
                'nombre' => $profesor[1],
                'apellido1' => $apellidos[0],
                'apellido2' => $apellidos[1],
              ];
              $consulta->execute($parametros);
            }
          }
          // Fin comprobacion Profesor

          // Comprobar si existe grupo
          $consultaExiste = $conexion->prepare('SELECT a.inicio FROM Grupo AS g INNER JOIN Anio AS a ON a.inicio = g.Anio_inicio WHERE g.idGrupo = :idGrupo AND a.inicio = :curso');
          $parametrosExiste = [
            'idGrupo' => $spreadSheetAry[$i][3],
            'curso' => $anioAcademico[0],
          ];
          $consultaExiste->execute($parametrosExiste);
          $consultaExiste = $consultaExiste->fetchAll(PDO::FETCH_ASSOC);


          if(empty($consultaExiste)){
            $consulta = $conexion->prepare('INSERT INTO Grupo (idGrupo, Anio_inicio, ocupacion)
                                            VALUES (:idGrupo, :Anio_inicio, :ocupacion)');
            $parametros = [
              'idGrupo' => $spreadSheetAry[$i][3],
              'Anio_inicio' => $anioAcademico[0],
              'ocupacion' => $spreadSheetAry[$i][21],
            ];
            $consulta->execute($parametros);
          }
          // FIN COMPROBAR GRUPOS

          // Inicio vincular asignatura + Grupo/año (POSIBLEMENTE ESTO DEBE IR FUERA DEL BUCLE Y SE DEBE HACER EN UNA SEGUNDA ITERACIÓN!!!!)
          // IGUAL NO ES NECESARIA HACER UNA SEGUNDA ITERACIÓN SI EN ESTA ÚNICA YA HEMOS CREADO LOS GRUPOS Y LAS ASIGNATURAS PRÉVIAMENTE!
          $consultaExiste = $conexion->prepare('SELECT a.inicio FROM Grupo AS g INNER JOIN Anio AS a ON a.inicio = g.Anio_inicio WHERE g.idGrupo = :idGrupo AND a.inicio = :curso');
          /*
          SELECT *
          FROM Grupo_has_Asignaturas AS ga
          INNER JOIN Asignaturas AS a
          ON a.idAsignaturas = ga.Asignaturas_idAsignaturas
          INNER JOIN Grupo AS g
          ON g.idGrupo = ga.Grupo_idGrupo
          WHERE a.idAsignaturas = :idAsignaturas;
          */

          $parametrosExiste = [
            'idAsignaturas' => $spreadSheetAry[$i][0],
          ];
          $consultaExiste->execute($parametrosExiste);
          $consultaExiste = $consultaExiste->fetchAll(PDO::FETCH_ASSOC);


          if(empty($consultaExiste)){
            $consulta = $conexion->prepare('INSERT INTO Grupo (idGrupo, Anio_inicio, ocupacion)
                                            VALUES (:idGrupo, :Anio_inicio, :ocupacion)');
            $parametros = [
              'idGrupo' => $spreadSheetAry[$i][3],
              'Anio_inicio' => $anioAcademico[0],
              'ocupacion' => $spreadSheetAry[$i][21],
            ];
            $consulta->execute($parametros);
          }
          // Fin vincular asignatura + Grupo/año

        }


        $seleccion = 30;
        echo "Codi: ".$spreadSheetAry[$seleccion][0]."<br/>";
        echo "Asignatura: ".$spreadSheetAry[$seleccion][1]."<br/>";
        echo "Grup: ".$spreadSheetAry[$seleccion][3]."<br/>";
        echo "Total alumnes: ".$spreadSheetAry[$seleccion][21]."<br/>";
        echo "NIU: ".$spreadSheetAry[$seleccion][27]."<br/>";

        $profesor = explode(", ", $spreadSheetAry[$seleccion][28]);
        echo "</br>Nom: ".$profesor[1]."<br/>";
        $apellidos = explode(" ", $profesor[0]);
        //$profesor[1] = substr_replace($profesor[1] ,"", -1); //Eliminar la coma
        echo "Primer cognom: ".$apellidos[0]."<br/>";
        echo "Segon cognom: ".$apellidos[1]."<br/>";








        /*for($i=6; $i<274; $i++){
          echo "Codi: ".$spreadSheetAry[$i][0]."<br/>";
          echo "Asignatura: ".$spreadSheetAry[$i][1]."<br/>";
          echo "Curs: ".$spreadSheetAry[$i][2]."<br/>";
          echo "Grup: ".$spreadSheetAry[$i][3]."<br/>";
          echo "Tipologia acadèmica: ".$spreadSheetAry[$i][4]."<br/>";
          echo "Activ.: ".$spreadSheetAry[$i][5]."<br/>";
          echo "Tp: ".$spreadSheetAry[$i][5]."<br/>";
          echo "Vp: ".$spreadSheetAry[$i][6]."<br/>";
          echo "Torn: ".$spreadSheetAry[$i][7]."<br/><br/>";

          echo "Torn: ".$spreadSheetAry[i][8];
          echo "Torn: ".$spreadSheetAry[i][9];
          echo "Torn: ".$spreadSheetAry[i][10];
          echo "Torn: ".$spreadSheetAry[i][11];

          //print_r($spreadSheetAry[i]);
        }*/

        $id = 2;

        /*$conexion = new PDO("mysql:host=$servidor;dbname=$database;charset=UTF8", $usuario, $contrasenia);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        for($i=6; $i<274; $i++){
          //Comprobación para ver si existe la ID que vamos a ingresar
          $consultaExiste = $conexion->prepare('SELECT * FROM asignaturas WHERE idAsignaturas = :idAsignaturas');
          $parametrosExiste = [
            'idAsignaturas' => $spreadSheetAry[$i][0],
          ];
          $consultaExiste->execute($parametrosExiste);
          $consultaExiste = $consultaExiste->fetchAll(PDO::FETCH_ASSOC);

          //Si no hay contenido, entendemos que no existe y por tanto la añadimos. //Añadir ASIGNATURAS
          if(empty($consultaExiste)){
            $consulta = $conexion->prepare('INSERT INTO asignaturas (idAsignaturas, nombre) VALUES (:idAsignaturas,:nombre)');
            $parametros = [
              'idAsignaturas' => $spreadSheetAry[$i][0],
              'nombre' => $spreadSheetAry[$i][1],
            ];

            $consulta->execute($parametros);
          }
        }*/


        /*for($i=0; $i<5; $i++){
          $consulta = $conexion->prepare('INSERT INTO tbl_info (id, name, description, date) VALUES (:id,:name,:description,current_time)');
          $parametros = [
            'id' => $id,
            'name' => $spreadSheetAry[$i][0],
            'description' => $spreadSheetAry[$i][1],
          ];

          $consulta->execute($parametros);
        }*/






        /*$consulta_registrar = $conexion->prepare('INSERT INTO factura (cantidadTotal, Importe, Fecha, ID_Usuario) VALUES (:cantidadTotal,:importe,current_time ,:ID_Usuario)');
        $parametros = [
            'cantidadTotal' => $cantidadTotal,
            'importe' => $precioTotal,
            'ID_Usuario' => $_SESSION['id'],
        ];

        $consulta_registrar->execute($parametros);
        return true;*/




        /*$id = 2;
        $name = mysqli_real_escape_string($conn, $spreadSheetAry[0][0]);
        $description = mysqli_real_escape_string($conn, $spreadSheetAry[0][1]);


        $query = "insert into tbl_info(name,description) values(?,?)";
        $paramType = "ss";
        $paramArray = array(
            $name,
            $description
        );

        $insertId = $db->insert($query, $paramType, $paramArray);

        if (! empty($insertId)) {
            $type = "success";
            $message = "Excel Data Imported into the Database";
        } else {
            $type = "error";
            $message = "Problem in Importing Excel Data";
        }

        */

        /*for ($i = 0; $i <= $sheetCount; $i ++) {
            $name = "";
            if (isset($spreadSheetAry[$i][0])) {
                $name = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            }
            $description = "";
            if (isset($spreadSheetAry[$i][1])) {
                $description = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
            }

            if (! empty($name) || ! empty($description)) {
                $query = "insert into tbl_info(name,description) values(?,?)";
                $paramType = "ss";
                $paramArray = array(
                    $name,
                    $description
                );
                $insertId = $db->insert($query, $paramType, $paramArray);
                // $query = "insert into tbl_info(name,description) values('" . $name . "','" . $description . "')";
                // $result = mysqli_query($conn, $query);

                if (! empty($insertId)) {
                    $type = "success";
                    $message = "Excel Data Imported into the Database";
                } else {
                    $type = "error";
                    $message = "Problem in Importing Excel Data";
                }
            }
        }*/
    } else {
        $type = "error";
        $message = "Tipus d'arxiu invàlid. Puja un fitxer d'Excel. (.xlsx/.xls)";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<style>
body {
	font-family: Arial;
	width: 550px;
}

.outer-container {
	background: #F0F0F0;
	border: #e0dfdf 1px solid;
	padding: 40px 20px;
	border-radius: 2px;
}

.btn-submit {
	background: #333;
	border: #1d1d1d 1px solid;
	border-radius: 2px;
	color: #f0f0f0;
	cursor: pointer;
	padding: 5px 20px;
	font-size: 0.9em;
}

.tutorial-table {
	margin-top: 40px;
	font-size: 0.8em;
	border-collapse: collapse;
	width: 100%;
}

.tutorial-table th {
	background: #f0f0f0;
	border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

.tutorial-table td {
	background: #FFF;
	border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

#response {
	padding: 10px;
	margin-top: 10px;
	border-radius: 2px;
	display: none;
}

.success {
	background: #c7efd9;
	border: #bbe2cd 1px solid;
}

.error {
	background: #fbcfcf;
	border: #f3c6c7 1px solid;
}

div#response.display-block {
	display: block;
}
</style>
</head>

<body>
    <h2>Import Excel File into MySQL Database using PHP</h2>

    <div class="outer-container">
        <form action="" method="post" name="frmExcelImport"
            id="frmExcelImport" enctype="multipart/form-data">
            <div>
                <label>Choose Excel File</label> <input type="file"
                    name="file" id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Import</button>

            </div>

        </form>

    </div>
    <div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>


<?php
$sqlSelect = "SELECT * FROM asignaturas";
$result = $db->select($sqlSelect);
if (! empty($result)) {
    ?>

    <table class='tutorial-table'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>

            </tr>
        </thead>
<?php
    foreach ($result as $row) { // ($row = mysqli_fetch_array($result))
        ?>
        <tbody>
            <tr>
                <td><?php  echo $row['idAsignaturas']; ?></td>
                <td><?php  echo $row['nombre']; ?></td>
            </tr>
<?php
    }
    ?>
        </tbody>
    </table>
<?php
}
?>

</body>
</html>
