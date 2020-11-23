<?php
function delProfesoresDepartamento($conexion, $id) {
  try{
    $consulta = $conexion->prepare('DELETE FROM departamentos_has_profesores WHERE Departamentos_idDepartamentos = :id');

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
