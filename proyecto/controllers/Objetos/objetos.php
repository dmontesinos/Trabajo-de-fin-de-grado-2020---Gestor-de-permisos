<?php
include "models/conexionBD.php";
include "models/Objetos/consultarObjetos.php";

$lista = consultarObjetos(conexionBD());

include "views/Objetos/menuObjetos.php";
?>
