<?php
include "models/conexionBD.php";
include "models/Profesores/consultarProfesores.php";

$lista = consultarProfesores(conexionBD());

include "views/Profesores/menuProfesores.php";
?>
