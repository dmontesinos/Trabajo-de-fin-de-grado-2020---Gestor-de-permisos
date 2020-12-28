<?php
require_once ("models/conexionBD.php");
require_once("models/Centros/delCentro.php");

if(isset($_POST['id']) && !empty($_POST['id'])) {
    $error = borrarCentro(conexionBD(), $_POST['id']);

    if($error === false){
      echo '<script type="text/javascript">',
      '$(document).ready(function(){',
          '$("#container-fluid").load("index.php?accion=centros", function () {',
              'alert("El centre s\'ha eliminat correctament.");',
          '});',
      '});',
       '</script>';
    } else {
      echo '<script type="text/javascript">',
      '$(document).ready(function(){',
          '$("#container-fluid").load("index.php?accion=centros", function () {',
              'alert("El centre no s\'ha pogut eliminar.");',
          '});',
      '});',
       '</script>';
    }
}
?>
