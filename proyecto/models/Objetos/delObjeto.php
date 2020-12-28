<?php
function borrarObjeto($conexion, $id) {
  try{
    $consulta = $conexion->prepare('DELETE FROM objeto WHERE idObjeto = :id');
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
