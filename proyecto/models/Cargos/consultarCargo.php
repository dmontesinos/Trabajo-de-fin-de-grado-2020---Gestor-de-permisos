<?php
function consultarCargo($conexion, $id) {
  try{

    $consulta = $conexion->prepare('SELECT * FROM cargos WHERE idCargos = :id');
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
