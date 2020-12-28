<?php
function consultarDepartamento($conexion, $id) {
  try{

    $consulta = $conexion->prepare('SELECT * FROM departamentos WHERE idDepartamentos = :id');
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
