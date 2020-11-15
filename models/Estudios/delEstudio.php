<?php
function borrarEstudio($conexion, $id) {
  try{
    $consulta = $conexion->prepare('DELETE FROM estudios WHERE idEstudio = :id');
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
