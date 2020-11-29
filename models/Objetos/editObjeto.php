<?php
function editarObjeto($conexion, $id, $nombre) {
  try{

    $consulta = $conexion->prepare('UPDATE objeto SET nombre = :nombre WHERE idObjeto = :id');
    $parametros = [
      'id' => $id,
      'nombre' => $nombre,
    ];

    $consulta->execute($parametros);

    return false;
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
