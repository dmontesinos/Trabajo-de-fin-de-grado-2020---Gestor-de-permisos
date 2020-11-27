<?php
function consultarAmbito($conexion, $id, $ambito) {
  try{

    $consulta = $conexion->prepare('SELECT * FROM :ambito WHERE idAmbitos = :id');
    $parametros = [
      'ambito' => $ambito,
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
