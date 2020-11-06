<?php
require_once ("models/conexionBD.php");
require_once("models/Estudios/delEstudio.php");

if(isset($_POST['id']) && !empty($_POST['id'])) {
    $error = borrarEstudio(conexionBD(), $_POST['id']);

    if($error === false){
      echo '<script type="text/javascript">',
      '$(document).ready(function(){',
          '$("#container-fluid").load("index.php?accion=estudios", function () {',
              'alert("L\'estudi s\'ha eliminat correctament.");',
          '});',
      '});',
       '</script>';
    } else {
      echo '<script type="text/javascript">',
      '$(document).ready(function(){',
          '$("#container-fluid").load("index.php?accion=estudios", function () {',
              'alert("L\'estudi no s\'ha pogut eliminar.");',
          '});',
      '});',
       '</script>';
    }
}
?>
