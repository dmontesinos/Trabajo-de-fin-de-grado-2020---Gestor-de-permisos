<?php
function addEstudio($conexion, $id, $nombre, $acronimo, $idCentro, $activo, $tipo) {
  try{
    $consulta = $conexion->prepare('INSERT INTO estudios(idEstudio, nombre, acronimo, Centros_idCentros, activo, tipo) VALUES (:id, :nombre, :acronimo, :idCentro, :activo, :tipo)');

    $parametros = [
      'id' => $id,
      'nombre' => $nombre,
      'acronimo' => $acronimo,
      'idCentro' => $idCentro,
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
