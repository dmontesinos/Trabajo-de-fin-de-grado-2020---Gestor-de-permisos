<?php
include "models/conexionBD.php";
include "models/consultarAsignaturas.php";

$lista = consultarAsignaturas(conexionBD());

include "views/menuAsignaturas.php";
?>