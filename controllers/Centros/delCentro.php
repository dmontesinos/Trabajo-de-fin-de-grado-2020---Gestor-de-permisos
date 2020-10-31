<?php
require_once ("models/conexionBD.php");
require_once("models/Centros/delCentro.php");

if(isset($_POST['id']) && !empty($_POST['id'])) {
    borrarCentro(conexionBD(), $_POST['id']);
}
?>


//FALTAN AÑADIR LOS MENSAJES DE BORRADO SATISFACTORIO Y ERROR COMO LOS DE addCentro
