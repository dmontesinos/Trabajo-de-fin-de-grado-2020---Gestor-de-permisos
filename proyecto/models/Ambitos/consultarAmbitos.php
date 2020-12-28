<?php
function consultarAmbitos($conexion) {
    try{
        $consultar_ambitos = $conexion->prepare("SELECT * FROM ambitos");

        $consultar_ambitos->execute();
        $consultar_ambitos = $consultar_ambitos->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    return($consultar_ambitos);
}

?>
