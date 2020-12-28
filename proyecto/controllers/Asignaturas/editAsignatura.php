<?php
require_once ("models/conexionBD.php");
require_once("models/Asignaturas/editAsignatura.php");

//print_r($_POST);

if(isset($_POST['idAsignatura']) && (!empty($_POST['idAsignatura']))){
  $id = $_POST['idAsignatura'];
  $nombre = $_POST['nombre'];

  unset($_POST['idAsignatura']);
  unset($_POST['nombre']);

  $error = editarAsignatura(conexionBD(), $id, $nombre);

  if($error === false){
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=asignaturas", function () {',
            'alert("L\'assignatura s\'ha modificat correctament.");',
        '});',
    '});',
     '</script>';

  } else {
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=asignaturas", function () {',
            'alert("L\'assignatura no s\'ha pogut modificar. Error: '.$error.'");',
        '});',
    '});',
     '</script>';
    }

} else {
  require_once "models/Asignaturas/consultarAsignatura.php";
  $asignaturas = consultarAsignatura(conexionBD(), $_POST['id']);

  require_once "views/Asignaturas/editAsignatura.php";
  unset($_POST['id']);
}




 ?>
