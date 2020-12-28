<?php
  include_once "models/conexionBD.php";

  
if(isset($_POST['idObjeto']) && !empty($_POST['idObjeto'])){
  
  include_once "models/Objetos/asignarPermisosObjeto.php";
  include_once "models/Objetos/delPermisosObjeto.php";


  if(borrarPermisosObjeto(conexionBD(), $_POST['idObjeto']) == false){
    asignarPermisosObjeto(conexionBD(), $_POST['Centros'], $_POST['idObjeto'], 1);
    asignarPermisosObjeto(conexionBD(), $_POST['Departamentos'], $_POST['idObjeto'], 4);
    asignarPermisosObjeto(conexionBD(), $_POST['Estudios'], $_POST['idObjeto'], 2);
    asignarPermisosObjeto(conexionBD(), $_POST['Universidad'], $_POST['idObjeto'], 7);

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=objetos", function () {',
            'alert("S\'han modificat els permisos de l\'objecte.");',
        '});',
    '});',
    '</script>';

  } else {
    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=objetos", function () {',
            'alert("No s\'han pogut modificar els permisos de l\'objecte.");',
        '});',
    '});',
    '</script>';
  }

  unset($_POST);

  
} else {
  if(isset($_POST['id']) && !empty($_POST['id'])) {

    include_once "models/Ambitos/consultarAmbitos.php";
    include_once "models/Objetos/consultarObjeto.php";
    include "models/Objetos/consultarPermisosObjetoPorAmbito.php";

    $objeto = consultarObjeto(conexionBD(), $_POST['id']);
    $listaAmbitos = consultarAmbitos(conexionBD());

    include "views/Objetos/asignarPermisosObjeto.php";
  }
}
?>
