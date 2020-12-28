<?php
function consultarAsignatura($conexion, $id) {
  try{

    $consulta = $conexion->prepare('SELECT * FROM asignaturas WHERE idAsignaturas = :id');
    $parametros = [
      'id' => $id,
    ];

    $consulta->execute($parametros);
    $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);

    return($consulta);
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
