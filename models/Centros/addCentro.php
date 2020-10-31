<?php
function addCentro($connexion, $id, $nombre, $acronimo) {
  try{
    $consulta = $connexion->prepare('INSERT INTO centros(idCentro, nombre, acronimo) VALUES (:id, :nombre, :acronimo)');

    $parametros = [
      'id' => $id,
      'nombre' => $nombre,
      'acronimo' => $acronimo,
    ];

    $consulta->execute($parametros);

    return false;
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
