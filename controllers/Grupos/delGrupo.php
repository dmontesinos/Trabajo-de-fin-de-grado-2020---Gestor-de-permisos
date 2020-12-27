<?php
require_once ("models/conexionBD.php");
require_once("models/Grupos/delGrupo.php");

if(isset($_POST['idGrupo']) && !empty($_POST['idGrupo'])) {
    $error = borrarGrupo(conexionBD(), $_POST['idAsignatura'], $_POST['idGrupo'], $_POST['curso']);

    if($error === false){
      echo '<script type="text/javascript">',
      '$(document).ready(function(){',
          '$("#container-fluid").load("index.php?accion=grupos", function () {',
              'alert("El grup ha sigut eliminat correctament.");',
          '});',
      '});',
       '</script>';
    } else {
      echo '<script type="text/javascript">',
      '$(document).ready(function(){',
          '$("#container-fluid").load("index.php?accion=grupos", function () {',
              'alert("El grup no s\'ha pogut eliminar. '.$error.'");',
          '});',
      '});',
       '</script>';
    }
}
?>
