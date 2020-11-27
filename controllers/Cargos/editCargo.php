<?php
require_once ("models/conexionBD.php");
require_once("models/Cargos/editCargo.php");


if(isset($_POST['idCargos']) && (!empty($_POST['idCargos']))){
  $id = $_POST['idCargos'];
  $descripcion = $_POST['descripcion'];
  $idEnAmbito = $_POST['idEnAmbito'];
  $Ambitos_idAmbitos = $_POST['Ambitos_idAmbitos'];


  unset($_POST['idCargos']);
  unset($_POST['descripcion']);
  unset($_POST['idEnAmbito']);
  unset($_POST['Ambitos_idAmbitos']);

  $error = editarCargo(conexionBD(), $id, $descripcion, $idEnAmbito, $Ambitos_idAmbitos);

  if($error === false){
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=cargos", function () {',
            'alert("El càrrec s\'ha modificat correctament.");',
        '});',
    '});',
     '</script>';

  } else {
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=cargos", function () {',
            'alert("El càrrec no s\'ha pogut modificar. Error: '.$error.'");',
        '});',
    '});',
     '</script>';
    }

} else {
  require_once "models/Cargos/consultarCargo.php";
  $cargos = consultarCargo(conexionBD(), $_POST['id']);

  require_once "models/Ambitos/consultarAmbitos.php";
  $ambitos = consultarAmbitos(conexionBD());

  require_once "views/Cargos/editCargo.php";
  unset($_POST['id']);
}




 ?>
