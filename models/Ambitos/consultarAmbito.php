<?php
function consultarAmbito($conexion, $id) {
  try{

    $consulta = $conexion->prepare('SELECT * FROM ambitos WHERE idAmbitos = :id');
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
