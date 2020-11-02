<?php
require_once ("models/conexionBD.php");
require_once("models/Centros/editCentro.php");

//print_r($_POST);

if(isset($_POST['idCentro']) && (!empty($_POST['idCentro']))){
  $id = $_POST['idCentro'];
  $nombre = $_POST['nombreCentro'];
  $acronimo = $_POST['acroCentro'];

  unset($_POST['idCentro']);
  unset($_POST['nombreCentro']);
  unset($_POST['acroCentro']);

  $error = editarCentro(conexionBD(), $id, $nombre, $acronimo);

  if($error === false){
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=centros", function () {',
            'alert("El centro ha sido modificado correctamente.");',
        '});',
    '});',
     '</script>';

  } else {
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=centros", function () {',
            'alert("El centro no ha podido ser modificado. Error: '.$error.'");',
        '});',
    '});',
     '</script>';
    }

} else {
  require_once "models/Centros/consultarCentro.php";
  $centros = consultarCentro(conexionBD(), $_POST['id']);

  require_once "views/Centros/editCentro.php";
  unset($_POST['id']);
}




 ?>
