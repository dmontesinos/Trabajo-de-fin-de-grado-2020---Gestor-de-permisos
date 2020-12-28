<?php
include "models/conexionBD.php";
include "models/Centros/consultarCentros.php";

$lista = consultarCentros(conexionBD());

include "views/Centros/menuCentros.php";
?>
