<?php
function consultarCargos($conexion) {
    try{
        $consultar_cargos = $conexion->prepare("SELECT * FROM cargos");

        $consultar_cargos->execute();
        $consultar_cargos = $consultar_cargos->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    return($consultar_cargos);
}

?>
