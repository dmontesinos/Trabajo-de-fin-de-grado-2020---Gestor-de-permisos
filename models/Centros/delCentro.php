<?php
function borrarCentro($connexion, $id) {
  try{
    $consulta = $connexion->prepare('DELETE FROM centros WHERE idCentro = :id');
    $parametros = [
      'id' => $id,
    ];

    $consulta->execute($parametros);

    return true;
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
