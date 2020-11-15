<?php
function addProfesor($conexion, $id, $nombre, $apellido1, $apellido2) {
  try{
    $consulta = $conexion->prepare('INSERT INTO profesores(niu, nombre, apellido1, apellido2) VALUES (:id, :nombre, :apellido1, :apellido2)');

    $parametros = [
      'id' => $id,
      'nombre' => $nombre,
      'apellido1' => $apellido1,
      'apellido2' => $apellido2,
    ];

    $consulta->execute($parametros);

    return false;
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
