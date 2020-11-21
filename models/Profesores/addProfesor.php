<?php
function addProfesor($conexion, $id, $nombre, $apellido) {
  try{
    $consulta = $conexion->prepare('INSERT INTO profesores(niu, nombre, apellidos) VALUES (:id, :nombre, :apellidos)');

    $parametros = [
      'id' => $id,
      'nombre' => $nombre,
      'apellidos' => $apellidos,
    ];

    $consulta->execute($parametros);

    return false;
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
