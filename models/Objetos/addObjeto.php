<?php
function addObjeto($conexion, $nombre, $descripcion) {
  try{
    $consulta = $conexion->prepare('INSERT INTO Objeto(nombre, descripcion) VALUES (:nombre, :descripcion)');

    $parametros = [
      //'id' => $id,
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
