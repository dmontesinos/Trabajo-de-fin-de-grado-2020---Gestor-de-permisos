<?php
function consultarEstudios($conexion) {
    try{
        $consultar_estudios = $conexion->prepare("SELECT * FROM estudios");

        $consultar_estudios->execute();
        $consultar_estudios = $consultar_estudios->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    return($consultar_estudios);
}

?>
