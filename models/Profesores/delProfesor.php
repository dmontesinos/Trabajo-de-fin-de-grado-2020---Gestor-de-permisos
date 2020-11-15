<?php
function borrarProfesor($conexion, $id) {
  try{
    $consulta = $conexion->prepare('DELETE FROM profesores WHERE niu = :id');
    $parametros = [
      'id' => $id,
    ];

    $consulta->execute($parametros);

    return false;
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
