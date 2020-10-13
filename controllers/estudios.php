<?php
include "models/conexionBD.php";
include "models/consultarEstudios.php";

$lista = consultarEstudios(conexionBD());

include "views/menuEstudios.php";
?>