<?php
function addProfesor($conexion, $id, $nombre, $apellido) {
  try{
    $consulta = $conexion->prepare('INSERT INTO profesores(niu, nombre, apellido) VALUES (:id, :nombre, :apellido)');

    $parametros = [
      'id' => $id,
      'nombre' => $nombre,
      'apellido' => $apellido,
    ];

    $consulta->execute($parametros);

    return false;
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
