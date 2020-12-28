<?php
require_once ("models/conexionBD.php");
require_once("models/Asignaturas/delAsignatura.php");

if(isset($_POST['id']) && !empty($_POST['id'])) {
    $error = borrarAsignatura(conexionBD(), $_POST['id']);

    if($error === false){
      echo '<script type="text/javascript">',
      '$(document).ready(function(){',
          '$("#container-fluid").load("index.php?accion=asignaturas", function () {',
              'alert("L\'assignatura ha sigut eliminada correctament.");',
          '});',
      '});',
       '</script>';
    } else {
      echo '<script type="text/javascript">',
      '$(document).ready(function(){',
          '$("#container-fluid").load("index.php?accion=asignaturas", function () {',
              'alert("L\'assignatura no ha pogut ser eliminada.");',
          '});',
      '});',
       '</script>';
    }
}
?>
