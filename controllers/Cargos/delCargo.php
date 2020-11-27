<?php
require_once ("models/conexionBD.php");
require_once("models/Cargos/delCargo.php");

if(isset($_POST['id']) && !empty($_POST['id'])) {
    $error = borrarCargo(conexionBD(), $_POST['id']);

    if($error === false){
      echo '<script type="text/javascript">',
      '$(document).ready(function(){',
          '$("#container-fluid").load("index.php?accion=cargos", function () {',
              'alert("El càrrec s\'ha eliminat correctament.");',
          '});',
      '});',
       '</script>';
    } else {
      echo '<script type="text/javascript">',
      '$(document).ready(function(){',
          '$("#container-fluid").load("index.php?accion=cargos", function () {',
              'alert("El càrrec no s\'ha pogut eliminar.");',
          '});',
      '});',
       '</script>';
    }
}
?>
