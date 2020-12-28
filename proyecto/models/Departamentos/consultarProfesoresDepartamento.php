<?php
function consultarProfesoresDepartamento($conexion, $id_departamento){
  try{

    $consultar_profesores = $conexion->prepare("SELECT Profesores_niu FROM departamentos_has_profesores WHERE Departamentos_idDepartamentos = :id_departamento");
    $parametros = [
      'id_departamento' => $id_departamento,
    ];

    $consultar_profesores->execute($parametros);
    $consultar_profesores = $consultar_profesores->fetchAll(PDO::FETCH_ASSOC);

    return($consultar_profesores);
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
