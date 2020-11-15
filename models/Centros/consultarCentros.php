<?php
function consultarCentros($conexion) {
    try{
        $consultar_centros = $conexion->prepare("SELECT * FROM centros");

        $consultar_centros->execute();
        $consultar_centros = $consultar_centros->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    return($consultar_centros);
}

?>
