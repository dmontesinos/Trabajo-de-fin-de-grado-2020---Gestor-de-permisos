<?php
function borrarGrupo($conexion, $idAsignatura, $idGrupo, $curso) {
  try{
    $consulta = $conexion->prepare('DELETE FROM Grupo_has_Asignaturas WHERE Grupo_idGrupo = :idGrupo AND Asignaturas_idAsignaturas = :idAsignatura');
    $parametros = [
      'idAsignatura' => $idAsignatura,
      'idGrupo' => $idGrupo,
    ];

    $consulta->execute($parametros);

    return false;
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
