<?php
require_once "models/conexionBD.php";
require_once "models/Profesores/addProfesor.php";


if(isset($_POST['niu']) && (!empty($_POST['niu']))){
  $id = $_POST['niu'];
  $nombre = $_POST['nombreProfesor'];
  $apellidos = $_POST['apellidosProfesor'];


  unset($_POST['niu']);
  unset($_POST['nombreProfesor']);
  unset($_POST['apellidosProfesor']);

  $error = addProfesor(conexionBD(), $id, $nombre, $apellidos);

  if($error === false){
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=addProfesor", function () {',
            'alert("El professor s\'ha afegit correctament.");',
        '});',
    '});',
     '</script>';

  } else {

  include_once 'controllers/portada.php';

  echo '<script type="text/javascript">',
  '$(document).ready(function(){',
      '$("#container-fluid").load("index.php?accion=addProfesor", function () {',
          'alert("El professor no s\'ha pogut afegir. Error: '.$error.'");',
      '});',
  '});',
   '</script>';
  }

} else {
  require_once "views/Profesores/addProfesor.php";
}

?>
