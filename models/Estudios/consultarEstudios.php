<?php
function consultarEstudios($connexion) {
    try{
        $consultar_estudios = $connexion->prepare("SELECT * FROM estudios");
        /*$parametros = [
            'idUsuario' => $_SESSION['id'],
        ];*/
        $consultar_estudios->execute();
        $consultar_estudios = $consultar_estudios->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    return($consultar_estudios);
}

?>