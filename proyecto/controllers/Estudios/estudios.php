<?php
include "models/conexionBD.php";
include "models/Estudios/consultarEstudios.php";

$lista = consultarEstudios(conexionBD());

include "views/Estudios/menuEstudios.php";
?>
