<?php
function editarAsignatura($conexion, $id, $nombre) {
  try{

    $consulta = $conexion->prepare('UPDATE asignaturas SET nombre = :nombre WHERE idAsignaturas = :id');
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
