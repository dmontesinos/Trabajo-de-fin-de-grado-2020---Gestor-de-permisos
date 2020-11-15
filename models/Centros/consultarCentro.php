<?php
function consultarCentro($conexion, $id) {
  try{

    $consulta = $conexion->prepare('SELECT * FROM centros WHERE idCentro = :id');
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
