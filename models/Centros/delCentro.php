<?php
function borrarCentro($connexion, $id) {
  try{
    $consulta = $connexion->prepare('DELETE FROM centros WHERE idCentro = :id');
    $parametros = [
      'id' => $id,
    ];

    $consulta->execute($parametros);

    return false;
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>