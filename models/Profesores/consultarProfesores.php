<?php
function consultarProfesores($connexion) {
    try{
        $consultar_profesores = $connexion->prepare("SELECT * FROM profesores");

        $consultar_profesores->execute();
        $consultar_profesores = $consultar_profesores->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    return($consultar_profesores);
}

?>
