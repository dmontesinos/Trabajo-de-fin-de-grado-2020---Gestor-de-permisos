<?php
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once 'DataSource.php';
$servidor = "localhost"; $usuario = "root"; $contrasenia = "q1w2e3r4"; $database = "gestor_de_permisos";
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


        //echo sizeof($spreadSheetAry);


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

        $conexion = new PDO("mysql:host=$servidor;dbname=$database;charset=UTF8", $usuario, $contrasenia);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        for($i=6; $i<274; $i++){


          //Comprobación para ver si existe la ID que vamos a ingresar
          $consultaExiste = $conexion->prepare('SELECT * FROM asignaturas WHERE idAsignaturas = :idAsignaturas');
          $parametrosExiste = [
            'idAsignaturas' => $spreadSheetAry[$i][0],
          ];
          $consultaExiste->execute($parametrosExiste);
          $consultaExiste = $consultaExiste->fetchAll(PDO::FETCH_ASSOC);

          //Si no hay contenido, entendemos que no existe y por tanto la añadimos.
          if(empty($consultaExiste)){
            $consulta = $conexion->prepare('INSERT INTO asignaturas (idAsignaturas, nombre) VALUES (:idAsignaturas,:nombre)');
            $parametros = [
              'idAsignaturas' => $spreadSheetAry[$i][0],
              'nombre' => $spreadSheetAry[$i][1],
            ];

            $consulta->execute($parametros);
          }
        }


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
