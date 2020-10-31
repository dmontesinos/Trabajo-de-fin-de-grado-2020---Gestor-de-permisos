<?php
function consultarCentros($connexion) {
    try{
        $consultar_centros = $connexion->prepare("SELECT * FROM centros");

        $consultar_centros->execute();
        $consultar_centros = $consultar_centros->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    return($consultar_centros);
}

?>
