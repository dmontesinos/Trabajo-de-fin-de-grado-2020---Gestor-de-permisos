<?php
include "models/conexionBD.php";
include "models/Profesores/consultarProfesores.php";
include "models/Cargos/consultarProfesoresCargo.php";
include "models/Cargos/delProfesoresCargo.php";
include "models/Cargos/consultarCargo.php";




if(isset($_POST['profesores']) && !empty($_POST['profesores'])){

  include "models/Cargos/addProfesorCargo.php";

  if(delProfesoresCargo(conexionBD(), $_GET['idCargo']) === false){
    foreach ($_POST["profesores"] as $profesor) {
      $error = addProfesorCargo(conexionBD(), $_GET['idCargo'], $profesor);
    }
  } else {
    include_once 'controllers/portada.php';
    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=cargos", function () {',
            'alert("S\'ha produït un error en l\'assignació.");',
        '});',
    '});',
     '</script>';
  }



  if($error === false){
    include_once 'controllers/portada.php';
    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=cargos", function () {',
            'alert("S\'han realitzat totes les assignacions correctament.");',
        '});',
    '});',
     '</script>';
  }

  unset($_POST["profesores"]);
} else {
  if(isset($_POST['id']) && !empty($_POST['id'])) {
    $listaProf = consultarProfesoresCargo(conexionBD(), $_POST['id']);

    $listaProfCargo = array();
    foreach ($listaProf as $profesorEnCargo) {
      array_push($listaProfCargo, $profesorEnCargo["Profesores_niu"]);
    }

    $nombreCargo = consultarCargo(conexionBD(), $_POST['id']);
    $lista = consultarProfesores(conexionBD());
    include "views/Cargos/asignarProfesorCargo.php";
  } else {
    if(isset($_GET['idCargo'])){
      delProfesoresCargo(conexionBD(), $_GET['idCargo']);
      include_once 'controllers/portada.php';
      echo '<script type="text/javascript">',
      '$(document).ready(function(){',
          '$("#container-fluid").load("index.php?accion=cargos", function () {',
              'alert("S\'han eliminat totes les assignacions del càrrec.");',
          '});',
      '});',
       '</script>';

    } else {
      include_once 'controllers/portada.php';
    }
  }
}
?>
