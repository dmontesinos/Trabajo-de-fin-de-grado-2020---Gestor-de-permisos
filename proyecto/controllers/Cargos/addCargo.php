<?php
require_once "models/conexionBD.php";
require_once "models/Cargos/addCargo.php";


if(isset($_POST['descripcion']) && (!empty($_POST['descripcion']))){
  //$id = $_POST['idCargos'];
  $nombre = $_POST['descripcion'];
  $idEnAmbito = $_POST['idEnAmbito'];
  $Ambitos_idAmbitos = $_POST['Ambitos_idAmbitos'];

  //unset($_POST['idCargos']);
  unset($_POST['descripcion']);
  unset($_POST['idEnAmbito']);
  unset($_POST['Ambitos_idAmbitos']);

  $error = addCargo(conexionBD(), $nombre, $idEnAmbito, $Ambitos_idAmbitos);

  if($error === false){
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=cargos", function () {',
            'alert("El càrrec s\'ha afegit correctament.");',
        '});',
    '});',
     '</script>';

  } else {

  include_once 'controllers/portada.php';

  echo '<script type="text/javascript">',
  '$(document).ready(function(){',
      '$("#container-fluid").load("index.php?accion=cargos", function () {',
          'alert("El càrrec no s\'ha pogut afegir. Error: '.$error.'");',
      '});',
  '});',
   '</script>';
  }

} else {
  require_once "models\Ambitos\consultarAmbitos.php";
  $ambitos = consultarAmbitos(conexionBD());
  require_once "views/Cargos/addCargo.php";
}

?>
