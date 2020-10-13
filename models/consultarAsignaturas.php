<?php
function consultarAsignaturas($connexion) {
    try{
        $consultar_asignaturas = $connexion->prepare("SELECT * FROM asignaturas");
        /*$parametros = [
            'idUsuario' => $_SESSION['id'],
        ];*/
        $consultar_asignaturas->execute();
        $consultar_asignaturas = $consultar_asignaturas->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    return($consultar_asignaturas);
}

?>