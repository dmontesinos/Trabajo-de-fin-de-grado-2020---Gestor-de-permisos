<?php
function consultarDepartamentos($conexion) {
    try{
        $consultar_departamentos = $conexion->prepare("SELECT * FROM departamentos");

        $consultar_departamentos->execute();
        $consultar_departamentos = $consultar_departamentos->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    return($consultar_departamentos);
}

?>
