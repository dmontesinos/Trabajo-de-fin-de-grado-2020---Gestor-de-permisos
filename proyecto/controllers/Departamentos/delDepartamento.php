<?php
require_once ("models/conexionBD.php");
require_once("models/Departamentos/delDepartamento.php");

if(isset($_POST['id']) && !empty($_POST['id'])) {
    $error = borrarDepartamento(conexionBD(), $_POST['id']);

    if($error === false){
      echo '<script type="text/javascript">',
      '$(document).ready(function(){',
          '$("#container-fluid").load("index.php?accion=departamentos", function () {',
              'alert("El departament s\'ha eliminat correctament.");',
          '});',
      '});',
       '</script>';
    } else {
      echo '<script type="text/javascript">',
      '$(document).ready(function(){',
          '$("#container-fluid").load("index.php?accion=centros", function () {',
              'alert("El departament no s\'ha pogut eliminar.");',
          '});',
      '});',
       '</script>';
    }
}
?>
