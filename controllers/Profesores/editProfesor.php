<?php
require_once ("models/conexionBD.php");
require_once("models/Profesores/editProfesor.php");


if(isset($_POST['niu']) && (!empty($_POST['niu']))){
  $id = $_POST['niu'];
  $nombre = $_POST['nombreProfesor'];
  $apellidos = $_POST['apellidosProfesor'];


  unset($_POST['niu']);
  unset($_POST['nombreProfesor']);
  unset($_POST['apellidosProfesor']);

  $error = editarProfesor(conexionBD(), $id, $nombre, $apellidos);

  if($error === false){
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=profesores", function () {',
            'alert("El professor s\'ha modificat correctament.");',
        '});',
    '});',
     '</script>';

  } else {
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=profesores", function () {',
            'alert("El professor no s\'ha pogut modificar. Error: '.$error.'");',
        '});',
    '});',
     '</script>';
    }

} else {
  require_once "models/Profesores/consultarProfesor.php";
  $profesores = consultarProfesor(conexionBD(), $_POST['id']);

  require_once "views/Profesores/editProfesor.php";
  unset($_POST['id']);
}




 ?>
