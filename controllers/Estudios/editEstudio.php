<?php
require_once ("models/conexionBD.php");
require_once("models/Estudios/editEstudio.php");


if(isset($_POST['idEstudio']) && (!empty($_POST['idEstudio']))){
  $id = $_POST['idEstudio'];
  $nombre = $_POST['nombreEstudio'];
  $acronimo = $_POST['acroEstudio'];
  $centro = $_POST['centro'];
  $activo = $_POST['activo'];
  $tipo = $_POST['tipo'];

  unset($_POST['idEstudio']);
  unset($_POST['nombreEstudio']);
  unset($_POST['acroEstudio']);
  unset($_POST['centro']);
  unset($_POST['activo']);
  unset($_POST['tipo']);

  $error = editarEstudio(conexionBD(), $id, $nombre, $acronimo, $centro, $activo, $tipo);

  if($error === false){
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=estudios", function () {',
            'alert("L\'estudi s\'ha modificat correctament.");',
        '});',
    '});',
     '</script>';

  } else {
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=estudios", function () {',
            'alert("L\'estudi no s\'ha pogut modificar. Error: '.$error.'");',
        '});',
    '});',
     '</script>';
    }

} else {
  require_once "models/Estudios/consultarEstudio.php";
  $estudios = consultarEstudio(conexionBD(), $_POST['id']);

  require_once "views/Estudios/editEstudio.php";
  unset($_POST['id']);
}
 ?>
