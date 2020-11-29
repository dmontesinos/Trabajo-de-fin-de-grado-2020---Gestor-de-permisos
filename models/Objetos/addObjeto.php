<?php
function addObjeto($conexion, $nombre) {
  try{
    $consulta = $conexion->prepare('INSERT INTO Objeto(nombre) VALUES (:nombre)');

    $parametros = [
      //'id' => $id,
      'nombre' => $nombre,
    ];

    $consulta->execute($parametros);

    return false;
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
