<?php
include "models/conexionBD.php";
include "models/Departamentos/consultarDepartamentos.php";

$lista = consultarDepartamentos(conexionBD());

include "views/Departamentos/menuDepartamentos.php";
?>
