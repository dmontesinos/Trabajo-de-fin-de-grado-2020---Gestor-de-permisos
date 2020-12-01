<?php
function consultarGruposAsignatura($conexion, $idAsignatura) {
  try{

    $consulta = $conexion->prepare('SELECT *
      FROM Grupo AS g
      INNER JOIN Grupo_has_Asignaturas AS ga
      ON g.idGrupo = ga.Grupo_idGrupo
      INNER JOIN Asignaturas AS a
      ON a.idAsignaturas = ga.Asignaturas_idAsignaturas
      WHERE a.idAsignaturas = :idAsignatura');
    $parametros = [
      'idAsignatura' => $idAsignatura,
    ];

    $consulta->execute($parametros);
    $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);

    return($consulta);
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
