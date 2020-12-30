<?php
require_once "models/conexionBD.php";
require_once "models/Estudios/addEstudio.php";


if(isset($_POST['idEstudio']) && (!empty($_POST['idEstudio']))){
  $id = $_POST['idEstudio'];
  $nombre = $_POST['nombreEstudio'];
  $acronimo = $_POST['acroEstudio'];
  $idCentro = $_POST['idCentro'];
  $activo = $_POST['activo'];
  $tipo = $_POST['tipo'];


  unset($_POST['idEstudio']);
  unset($_POST['nombreEstudio']);
  unset($_POST['acroEstudio']);
  unset($_POST['idCentro']);
  unset($_POST['activo']);
  unset($_POST['tipo']);

  $error = addEstudio(conexionBD(), $id, $nombre, $acronimo, $idCentro, $activo, $tipo);

  if($error === false){
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=addEstudio", function () {',
            'alert("L\'estudi s\'ha fegit correctament.");',
        '});',
    '});',
     '</script>';

  } else {

  include_once 'controllers/portada.php';

  echo '<script type="text/javascript">',
  '$(document).ready(function(){',
      '$("#container-fluid").load("index.php?accion=addEstudio", function () {',
          'alert("No s\'ha afegit l\'estudi. Error: '.$error.'");',
      '});',
  '});',
   '</script>';
  }

} else {
  require_once "models/Centros/consultarCentros.php";
  $centros = consultarCentros(conexionBD());
  require_once "views/Estudios/addEstudio.php";
}

?>
