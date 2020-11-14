<?php
function editarProfesor($conexion, $id, $nombre, $apellido1, $apellido2) {
  try{

    $consulta = $conexion->prepare('UPDATE profesores SET nombre = :nombre, apellido1 = :apellido1, apellido2 = :apellido2 WHERE niu = :id');
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
