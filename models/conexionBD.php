<?php
	function conexionBD(){
	$servidor = "localhost"; $usuario = "root"; $contrasenia = "q1w2e3r4"; $database = "gestor_permisos";
	try{
		$conexion = new PDO("mysql:host=$servidor;dbname=$database;charset=UTF8", $usuario, $contrasenia);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	return($conexion);
	}
?>
