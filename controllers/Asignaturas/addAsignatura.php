<?php
require_once "models/conexionBD.php";
require_once "models/Asignaturas/addAsignatura.php";


if(isset($_POST['idAsignatura']) && (!empty($_POST['idAsignatura']))){
  $id = $_POST['idAsignatura'];
  $nombre = $_POST['nombreAsignatura'];

  unset($_POST['idAsignatura']);
  unset($_POST['nombreAsignatura']);

  $error = addAsignatura(conexionBD(), $id, $nombre);

  if($error === false){
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=addAsignatura", function () {',
            'alert("L\'assignatura s\'ha modificat correctament.");',
        '});',
    '});',
     '</script>';

  } else {

  include_once 'controllers/portada.php';

  echo '<script type="text/javascript">',
  '$(document).ready(function(){',
      '$("#container-fluid").load("index.php?accion=addAsignatura", function () {',
          'alert("L\'assignatura no s\'ha pogut modificar. Error: '.$error.'");',
      '});',
  '});',
   '</script>';
  }

} else {
  require_once "views/Asignaturas/addAsignatura.php";
}

?>
