<?php
function borrarCargo($conexion, $id) {
  try{
    $consulta = $conexion->prepare('DELETE FROM cargos WHERE idCargos = :id');
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
