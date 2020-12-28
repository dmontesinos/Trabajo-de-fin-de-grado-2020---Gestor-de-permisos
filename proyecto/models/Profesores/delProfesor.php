<?php
function borrarProfesor($conexion, $id) {
  try{
    //Borramos asignaciones a cargos
    $consultaCargos = $conexion->prepare('DELETE FROM Cargos_has_Profesores WHERE Profesores_niu = :id');
    $parametros = [
      'id' => $id,
    ];
    $consultaCargos->execute($parametros);

    //Borramos asignaciones a grupos
    $consultaGrupos = $conexion->prepare('DELETE FROM Profesores_has_Grupo WHERE Profesores_niu = :id');
    $parametros = [
      'id' => $id,
    ];
    $consultaGrupos->execute($parametros);

    //Borramos asignaciones a departamentos
    $consultaDepartamentos = $conexion->prepare('DELETE FROM Departamentos_has_Profesores WHERE Profesores_niu = :id');
    $parametros = [
      'id' => $id,
    ];
    $consultaDepartamentos->execute($parametros);

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
