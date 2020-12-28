<?php
function borrarDepartamento($conexion, $id) {
  try{
    $consulta = $conexion->prepare('DELETE FROM departamentos WHERE idDepartamentos = :id');
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
