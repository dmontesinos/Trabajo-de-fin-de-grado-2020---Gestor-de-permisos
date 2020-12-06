<?php
function editarObjeto($conexion, $id, $nombre, $descripcion) {
  try{

    $consulta = $conexion->prepare('UPDATE objeto SET nombre = :nombre, descripcion = :descripcion WHERE idObjeto = :id');
    $parametros = [
      'id' => $id,
      'nombre' => $nombre,
      'descripcion' => $descripcion,
    ];

    $consulta->execute($parametros);

    return false;
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
