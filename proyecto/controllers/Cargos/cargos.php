<?php
include "models/conexionBD.php";
include "models/Cargos/consultarCargos.php";
include "models/Ambitos/consultarAmbito.php";
include "models/Ambitos/consultarIdEnAmbito.php";

$lista = consultarCargos(conexionBD());

include "views/Cargos/menuCargos.php";
?>
