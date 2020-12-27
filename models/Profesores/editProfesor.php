<?php
function editarProfesor($conexion, $id, $nombre, $apellidos) {
  try{

    $consulta = $conexion->prepare('UPDATE profesores SET nombre = :nombre, apellido = :apellidos WHERE niu = :id');
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
