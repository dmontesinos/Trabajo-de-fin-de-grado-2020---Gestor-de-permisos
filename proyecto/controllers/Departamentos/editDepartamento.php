<?php
require_once ("models/conexionBD.php");
require_once("models/Departamentos/editDepartamento.php");


if(isset($_POST['idDepartamentos']) && (!empty($_POST['idDepartamentos']))){
  $id = $_POST['idDepartamentos'];
  $nombre = $_POST['nombreDepartamento'];
  $acronimo = $_POST['acroDepartamento'];

  unset($_POST['idDepartamentos']);
  unset($_POST['nombreDepartamento']);
  unset($_POST['acroDepartamento']);

  $error = editarDepartamento(conexionBD(), $id, $nombre, $acronimo);

  if($error === false){
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=departamentos", function () {',
            'alert("El departament s\'ha modificat correctament.");',
        '});',
    '});',
     '</script>';

  } else {
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=departamentos", function () {',
            'alert("El departament no s\'ha pogut modificar. Error: '.$error.'");',
        '});',
    '});',
     '</script>';
    }

} else {
  require_once "models/Departamentos/consultarDepartamento.php";
  $departamentos = consultarDepartamento(conexionBD(), $_POST['id']);

  require_once "views/Departamentos/editDepartamento.php";
  unset($_POST['id']);
}




 ?>
