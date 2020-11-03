<?php
function editarEstudio($conexion, $id, $nombre, $acronimo, $centros_idCentros, $activo, $tipo) {
  try{

    $consulta = $conexion->prepare('UPDATE estudios SET nombre = :nombre, acronimo = :acronimo, Centros_idCentros = :centros, activo = :activo, tipo = :tipo WHERE idEstudio = :id');
    $parametros = [
      'id' => $id,
      'nombre' => $nombre,
      'acronimo' => $acronimo,
      'centros' => $centros_idCentros,
      'activo' => $activo,
      'tipo' => $tipo,
    ];

    $consulta->execute($parametros);

    return false;
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
