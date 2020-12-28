<?php
require_once ("models/conexionBD.php");
require_once ("models/Objetos/delObjeto.php");
require_once ("models/Objetos/delPermisosObjeto.php");

if(isset($_POST['id']) && !empty($_POST['id'])) {

    //Borramos las dependencias en permisos y después el objeto
    borrarPermisosObjeto(conexionBD(), $_POST['id']);
    $error = borrarObjeto(conexionBD(), $_POST['id']);

    if($error === false){
      echo '<script type="text/javascript">',
      '$(document).ready(function(){',
          '$("#container-fluid").load("index.php?accion=objetos", function () {',
              'alert("L\'objecte s\'ha eliminat correctament.");',
          '});',
      '});',
       '</script>';
    } else {
      echo '<script type="text/javascript">',
      '$(document).ready(function(){',
          '$("#container-fluid").load("index.php?accion=objetos", function () {',
              'alert("L\'objecte no s\'ha pogut eliminar.");',
          '});',
      '});',
       '</script>';
    }
}
?>
