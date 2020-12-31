<?php
require_once "models/conexionBD.php";
require_once "models/Objetos/addObjeto.php";
require_once "models/Objetos/asignarPermisosObjeto.php";
require_once "models/Ambitos/consultarAmbitos.php";
require_once "models/Objetos/consultarObjetoPorNombre.php";


if(isset($_POST['nombreObjeto']) && (!empty($_POST['nombreObjeto']))){
  
  $nombre = $_POST['nombreObjeto'];
  $descripcion = $_POST['descripcionObjeto'];

  
  unset($_POST['nombreObjeto']);
  unset($_POST['descripcionObjeto']);


  $error = addObjeto(conexionBD(), $nombre, $descripcion);

  //Creación de los permisos por defecto
  $objeto = consultarObjetoPorNombre(conexionBD(), $nombre);
  $ambitos = consultarAmbitos(conexionBD());


  foreach ($ambitos as $ambito) {
    asignarPermisosObjeto(conexionBD(), "ninguno", $objeto[0]['idObjeto'], $ambito['idAmbitos']);
  }


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
