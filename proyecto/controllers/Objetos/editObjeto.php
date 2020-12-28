<?php
require_once ("models/conexionBD.php");
require_once("models/Objetos/editObjeto.php");


if(isset($_POST['idObjeto']) && (!empty($_POST['idObjeto']))){
  $id = $_POST['idObjeto'];
  $nombre = $_POST['nombreObjeto'];
  $descripcion = $_POST['descripcionObjeto'];

  unset($_POST['idObjeto']);
  unset($_POST['nombreObjeto']);
  unset($_POST['descripcionObjeto']);


  $error = editarObjeto(conexionBD(), $id, $nombre, $descripcion);

  if($error === false){
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=objetos", function () {',
            'alert("L\'objecte s\'ha modificat correctament.");',
        '});',
    '});',
     '</script>';

  } else {
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=objetos", function () {',
            'alert("L\'objecte no s\'ha pogut modificar. Error: '.$error.'");',
        '});',
    '});',
     '</script>';
    }

} else {
  require_once "models/Objetos/consultarObjeto.php";
  $objetos = consultarObjeto(conexionBD(), $_POST['id']);

  require_once "views/Objetos/editObjeto.php";
  unset($_POST['id']);
}
 ?>
