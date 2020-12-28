<?php
function consultarProfesor($conexion, $id) {
  try{

    $consulta = $conexion->prepare('SELECT * FROM profesores WHERE niu = :id');
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
