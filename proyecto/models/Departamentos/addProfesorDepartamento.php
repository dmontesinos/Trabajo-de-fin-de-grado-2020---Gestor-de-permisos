<?php
function addProfesorDepartamento($conexion, $id_departamento, $id_profesor) {
  try{
    $consulta = $conexion->prepare('INSERT INTO departamentos_has_profesores(Departamentos_idDepartamentos, Profesores_niu) VALUES (:id_departamento, :id_profesor)');

    $parametros = [
      'id_departamento' => $id_departamento,
      'id_profesor' => $id_profesor,
    ];

    $consulta->execute($parametros);

    return false;
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
