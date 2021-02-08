<?php
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once 'vendor/import-excel/DataSource.php';
$db = new DataSource();
$servidor = $db::HOST; $usuario = $db::USERNAME; $contrasenia = $db::PASSWORD; $database = $db::DATABASENAME;
$conn = $db->getConnection();
require_once ('vendor/import-excel/vendor/autoload.php');


if (isset($_POST["import"])) {
    
    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'vendor/import-excel/uploads/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new Xlsx();

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
        }

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
            $profesor = explode(", ", $spreadSheetAry[$i][28]);

            //$apellidos = explode(" ", $profesor[0]);
            //echo "</br>Nom: ".$profesor[1]."<br/>";
            //echo "Primer cognom: ".$apellidos[0]."<br/>";
            //echo "Segon cognom: ".$apellidos[1]."<br/>";


            if(empty($consultaExiste)){
              $consulta = $conexion->prepare('INSERT INTO Profesores (niu, nombre, apellido) VALUES (:niu, :nombre, :apellidos)');
              $parametros = [
                'niu' => $spreadSheetAry[$i][27],
                'nombre' => $profesor[1],
                //'apellido1' => $apellidos[0],
                //'apellido2' => $apellidos[1],
                'apellidos' => $profesor[0],
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
            $consulta = $conexion->prepare('INSERT INTO Grupo (idGrupo, Anio_inicio)
                                            VALUES (:idGrupo, :Anio_inicio)');
            $parametros = [
              'idGrupo' => $spreadSheetAry[$i][3],
              'Anio_inicio' => $anioAcademico[0],
            ];
            $consulta->execute($parametros);
          }
          // FIN COMPROBAR GRUPOS


          // Inicio vincular asignatura con estudios
          $consultaExiste = $conexion->prepare("
                          SELECT * FROM Asignaturas_has_Estudios AS ae
                          INNER JOIN Asignaturas AS a
                          ON ae.Asignaturas_idAsignaturas = a.idAsignaturas
                          INNER JOIN Estudios AS e
                          ON ae.Estudios_idEstudios = e.idEstudio
                          INNER JOIN Centros AS c
                          ON c.idCentro = e.Centros_idCentros
                          WHERE ae.Asignaturas_idAsignaturas = :idAsignaturas
                          AND ae.Estudios_idEstudios = :idEstudio
                          AND ae.Estudio_Centros_idCentros = :idCentro
                          ");


          $parametrosExiste = [
            'idAsignaturas' => $spreadSheetAry[$i][0],
            'idEstudio' => $idPlan[1],
            'idCentro' => $idCentroPlan[0],
          ];
          $consultaExiste->execute($parametrosExiste);
          $consultaExiste = $consultaExiste->fetchAll(PDO::FETCH_ASSOC);


          if(empty($consultaExiste)){
            $consulta = $conexion->prepare('INSERT INTO Asignaturas_has_Estudios
                                            VALUES (:idAsignaturas, :idEstudio, :idCentro)');
            $parametros = [
              'idAsignaturas' => $spreadSheetAry[$i][0],
              'idEstudio' => $idPlan[1],
              'idCentro' => $idCentroPlan[0],
            ];
            $consulta->execute($parametros);
          }
          // FIN vincular asignatura con estudios


          // Inicio vincular asignatura + Grupo/año (POSIBLEMENTE ESTO DEBE IR FUERA DEL BUCLE Y SE DEBE HACER EN UNA SEGUNDA ITERACIÓN!!!!)
          // IGUAL NO ES NECESARIA HACER UNA SEGUNDA ITERACIÓN SI EN ESTA ÚNICA YA HEMOS CREADO LOS GRUPOS Y LAS ASIGNATURAS PRÉVIAMENTE!
          $consultaExiste = $conexion->prepare('
                            SELECT *
                            FROM Grupo_has_Asignaturas AS ga
                            INNER JOIN Asignaturas AS a
                            ON a.idAsignaturas = ga.Asignaturas_idAsignaturas
                            INNER JOIN Grupo AS g
                            ON g.idGrupo = ga.Grupo_idGrupo
                            WHERE ga.Asignaturas_idAsignaturas = :idAsignaturas
                            AND ga.Grupo_idGrupo = :idGrupo');


          $parametrosExiste = [
            'idAsignaturas' => $spreadSheetAry[$i][0],
            'idGrupo' => $spreadSheetAry[$i][3],
          ];
          $consultaExiste->execute($parametrosExiste);
          $consultaExiste = $consultaExiste->fetchAll(PDO::FETCH_ASSOC);


          if(empty($consultaExiste)){
            $consulta = $conexion->prepare('INSERT INTO Grupo_has_Asignaturas (Grupo_idGrupo, Asignaturas_idAsignaturas, ocupacion)
                                            VALUES (:idGrupo, :idAsignaturas, :ocupacion)');
            $parametros = [
              'idGrupo' => $spreadSheetAry[$i][3],
              'idAsignaturas' => $spreadSheetAry[$i][0],
              'ocupacion' => $spreadSheetAry[$i][21],
            ];
            $consulta->execute($parametros);
          }
          // Fin vincular asignatura + Grupo/año



          // Vincular profesor con grupo y año + ocupación
          if($spreadSheetAry[$i][27] != ""){

            $consultaExiste = $conexion->prepare('
                                        SELECT *
                                        FROM Profesores_has_Grupo AS pg
                                        INNER JOIN Grupo AS g
                                        ON pg.Grupo_idGrupo = g.idGrupo
                                        INNER JOIN Anio AS a
                                        ON g.Anio_inicio = a.inicio
                                        INNER JOIN Profesores AS pr
                                        ON pr.niu = pg.Profesores_niu
                                        WHERE pg.Profesores_niu = :niu
                                        AND pg.Grupo_idGrupo = :idGrupo
                                        AND pg.Grupo_Anio_inicio = :anio
                                        ');

            $parametrosExiste = [
              'niu' => $spreadSheetAry[$i][27],
              'idGrupo' => $spreadSheetAry[$i][3],
              'anio' => $anioAcademico[0],

            ];
            $consultaExiste->execute($parametrosExiste);
            $consultaExiste = $consultaExiste->fetchAll(PDO::FETCH_ASSOC);


            if(empty($consultaExiste)){
              $consulta = $conexion->prepare('INSERT INTO Profesores_has_Grupo
                                              VALUES (:niu, :idGrupo, :anio)');
              $parametros = [
                'niu' => $spreadSheetAry[$i][27],
                'idGrupo' => $spreadSheetAry[$i][3],
                'anio' => $anioAcademico[0],
              ];
              $consulta->execute($parametros);
            }
          }
          // FIN vincular profesor con grupo

          // Vincular profesor con asignatura
          if($spreadSheetAry[$i][27] != ""){
            $consultaExiste = $conexion->prepare('
              SELECT *
              FROM profesores_has_asignaturas AS pa
              WHERE pa.profesores_niu = :niu 
              AND pa.asignaturas_idAsignaturas = :idAsignaturas
              AND pa.anio_inicio = :anio');


              $parametrosExiste = [
                'niu' => $spreadSheetAry[$i][27],
                'idAsignaturas' => $spreadSheetAry[$i][0],
                'anio' => $anioAcademico[0],
              ];

            $consultaExiste->execute($parametrosExiste);
            $consultaExiste = $consultaExiste->fetchAll(PDO::FETCH_ASSOC);


            if(empty($consultaExiste)){
              $consulta = $conexion->prepare('INSERT INTO profesores_has_asignaturas
                                                VALUES (:niu, :idAsignaturas, :anio)');
              $parametros = [
                'niu' => $spreadSheetAry[$i][27],
                'idAsignaturas' => $spreadSheetAry[$i][0],
                'anio' => $anioAcademico[0],
              ];
              $consulta->execute($parametros);
            }
          }
          // FIN vincular profesor con asignatura
        }

        unset($_POST);
        include_once 'controllers/portada.php';

        echo '<script type="text/javascript">',
        '$(document).ready(function(){',
            '$("#container-fluid").load("index.php?accion=importacion", function () {',
                'alert("Importació de dades realitzada correctament.");',
            '});',
        '});',
        '</script>';
    } else {
        unset($_POST);

        include_once 'controllers/portada.php';

        echo '<script type="text/javascript">',
        '$(document).ready(function(){',
            '$("#container-fluid").load("index.php?accion=importacion", function () {',
                'alert("Tipus d\'arxiu invàlid. Puja un fitxer d\'Excel. (.xlsx/.xls)");',
            '});',
        '});',
        '</script>';
    }
} else {
    include "views/Importacion/importacion.php";
}


?>