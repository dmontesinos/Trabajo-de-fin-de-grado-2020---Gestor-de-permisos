<?php
require_once "models/conexionBD.php";
require_once "models/Centros/addCentro.php";


if(isset($_POST['idCentro']) && (!empty($_POST['idCentro']))){
  $id = $_POST['idCentro'];
  $nombre = $_POST['nombreCentro'];
  $acronimo = $_POST['acroCentro'];

  unset($_POST['idCentro']);
  unset($_POST['nombreCentro']);
  unset($_POST['acroCentro']);

  $error = addCentro(conexionBD(), $id, $nombre, $acronimo);

  if($error === false){
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=addCentro", function () {',
            'alert("El centre s\'ha afegit correctament.");',
        '});',
    '});',
     '</script>';

  } else {

  include_once 'controllers/portada.php';

  echo '<script type="text/javascript">',
  '$(document).ready(function(){',
      '$("#container-fluid").load("index.php?accion=addCentro", function () {',
          'alert("El centro no s\'ha pogut afegir. Error: '.$error.'");',
      '});',
  '});',
   '</script>';
  }

} else {
  require_once "views/Centros/addCentro.php";
}

?>
