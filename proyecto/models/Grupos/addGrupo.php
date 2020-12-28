<?php
function addGrupo($conexion, $grupo, $curso, $asignatura, $ocupacion) {
  try{
    // Comprobamos si existe el grupo en la base de datos
    $consultaGrupo = $conexion->prepare('SELECT * FROM Grupo WHERE idGrupo = :grupo AND Anio_inicio = :curso');
    $parametros = [
      'grupo' => $grupo,
      'curso' => $curso,
    ];

    $consultaGrupo->execute($parametros);
    $consultaGrupo = $consultaGrupo->fetchAll(PDO::FETCH_ASSOC);

    // Si no existe, lo añadimos
    if(empty($consultaGrupo)){
      $consultaGrupo = $conexion->prepare('INSERT INTO Grupo(idGrupo, Anio_inicio) VALUES (:grupo, :curso)');
      $parametros = [
        'grupo' => $grupo,
        'curso' => $curso,
      ];
      $consultaGrupo->execute($parametros);
    }


    // Añadimos la entrada asignatura-grupo-ocupacion
    $consulta = $conexion->prepare('INSERT INTO Grupo_has_Asignaturas(Grupo_idGrupo, Asignaturas_idAsignaturas, ocupacion) VALUES (:grupo, :asignatura, :ocupacion)');

    $parametros = [
      'grupo' => $grupo,
      'asignatura' => $asignatura,
      'ocupacion' => $ocupacion,
    ];

    $consulta->execute($parametros);

    return false;
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
