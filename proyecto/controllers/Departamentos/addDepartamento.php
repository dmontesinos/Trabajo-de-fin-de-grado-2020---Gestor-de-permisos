<?php
require_once "models/conexionBD.php";
require_once "models/Departamentos/addDepartamento.php";


if(isset($_POST['idDepartamentos']) && (!empty($_POST['idDepartamentos']))){
  $id = $_POST['idDepartamentos'];
  $nombre = $_POST['nombreDepartamento'];
  $acronimo = $_POST['acroDepartamento'];

  unset($_POST['idDepartamentos']);
  unset($_POST['nombreDepartamento']);
  unset($_POST['acroDepartamento']);

  $error = addDepartamento(conexionBD(), $id, $nombre, $acronimo);

  if($error === false){
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=addDepartamento", function () {',
            'alert("El departament s\'ha afegit correctament.");',
        '});',
    '});',
     '</script>';

  } else {

  include_once 'controllers/portada.php';

  echo '<script type="text/javascript">',
  '$(document).ready(function(){',
      '$("#container-fluid").load("index.php?accion=addDepartamento", function () {',
          'alert("El departament no s\'ha pogut afegir. Error: '.$error.'");',
      '});',
  '});',
   '</script>';
  }

} else {
  require_once "views/Departamentos/addDepartamento.php";
}

?>
