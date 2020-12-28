<?php
function delProfesoresCargo($conexion, $id) {
  try{
    $consulta = $conexion->prepare('DELETE FROM cargos_has_profesores WHERE Cargos_idCargos = :id');

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
