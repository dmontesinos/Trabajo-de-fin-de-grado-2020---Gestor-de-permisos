<?php
function consultarAsignaturas($conexion) {
    try{
        $consultar_asignaturas = $conexion->prepare("SELECT * FROM asignaturas");

        $consultar_asignaturas->execute();
        $consultar_asignaturas = $consultar_asignaturas->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    return($consultar_asignaturas);
}

?>
