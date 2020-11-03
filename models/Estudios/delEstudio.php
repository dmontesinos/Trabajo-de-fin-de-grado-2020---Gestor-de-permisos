<?php
function borrarEstudio($connexion, $id) {
  try{
    $consulta = $connexion->prepare('DELETE FROM estudios WHERE idEstudio = :id');
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
