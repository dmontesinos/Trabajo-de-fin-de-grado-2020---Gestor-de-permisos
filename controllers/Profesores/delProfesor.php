<?php
require_once ("models/conexionBD.php");
require_once("models/Profesores/delProfesor.php");

if(isset($_POST['id']) && !empty($_POST['id'])) {
    $error = borrarProfesor(conexionBD(), $_POST['id']);

    if($error === false){
      echo '<script type="text/javascript">',
      '$(document).ready(function(){',
          '$("#container-fluid").load("index.php?accion=profesores", function () {',
              'alert("El professor ha sigut eliminat correctament.");',
          '});',
      '});',
       '</script>';
    } else {
      echo '<script type="text/javascript">',
      '$(document).ready(function(){',
          '$("#container-fluid").load("index.php?accion=profesores", function () {',
              'alert("El professor no s\'ha pogut eliminar.");',
          '});',
      '});',
       '</script>';
    }
}
?>
