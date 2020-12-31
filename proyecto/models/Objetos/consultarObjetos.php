<?php
function consultarObjetos($conexion) {
    try{
        $consultar_objetos = $conexion->prepare("SELECT * FROM objeto");

        $consultar_objetos->execute();
        $consultar_objetos = $consultar_objetos->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    return($consultar_objetos);
}

?>
