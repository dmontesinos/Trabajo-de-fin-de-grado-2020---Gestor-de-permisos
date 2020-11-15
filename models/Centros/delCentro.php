<?php
function borrarCentro($conexion, $id) {
  try{
    $consulta = $conexion->prepare('DELETE FROM centros WHERE idCentro = :id');
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
