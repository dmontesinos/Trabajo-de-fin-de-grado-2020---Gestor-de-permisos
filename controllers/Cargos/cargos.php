<?php
include "models/conexionBD.php";
include "models/Cargos/consultarCargos.php";
include "models/Ambitos/consultarAmbito.php";

$lista = consultarCargos(conexionBD());

include "views/Cargos/menuCargos.php";
?>
