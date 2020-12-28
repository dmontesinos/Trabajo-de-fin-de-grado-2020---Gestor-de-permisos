<?php
include "models/conexionBD.php";
include "models/Asignaturas/consultarAsignaturas.php";

$lista = consultarAsignaturas(conexionBD());

include "views/Asignaturas/menuAsignaturas.php";
?>
