<?php
include "models/conexionBD.php";
include "models/consultarCentros.php";

$lista = consultarCentros(conexionBD());

include "views/menuCentros.php";
?>