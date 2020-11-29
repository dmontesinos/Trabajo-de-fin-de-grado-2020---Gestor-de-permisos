<?php
require_once "models/conexionBD.php";
require_once "models/Objetos/addObjeto.php";


if(isset($_POST['nombreObjeto']) && (!empty($_POST['nombreObjeto']))){
  //$id = $_POST['idObjeto'];
  $nombre = $_POST['nombreObjeto'];

  //unset($_POST['idObjeto']);
  unset($_POST['nombreObjeto']);

  $error = addObjeto(conexionBD(), $nombre);

  if($error === false){
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=addObjeto", function () {',
            'alert("L\'objecte s\'ha fegit correctament.");',
        '});',
    '});',
     '</script>';

  } else {

  include_once 'controllers/portada.php';

  echo '<script type="text/javascript">',
  '$(document).ready(function(){',
      '$("#container-fluid").load("index.php?accion=addObjeto", function () {',
          'alert("No s\'ha afegit l\'objecte. Error: '.$error.'");',
      '});',
  '});',
   '</script>';
  }

} else {
  require_once "views/Objetos/addObjeto.php";
}

?>
