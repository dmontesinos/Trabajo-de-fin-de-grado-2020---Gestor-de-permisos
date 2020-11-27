<?php
function addCargo($conexion, $descripcion, $idEnAmbito, $Ambitos_idAmbitos) {
  try{
    $consulta = $conexion->prepare('INSERT INTO cargos(descripcion, idEnAmbito, Ambitos_idAmbitos) VALUES (:descripcion, :idEnAmbito, :Ambitos_idAmbitos)');

    $parametros = [
      'descripcion' => $descripcion,
      'idEnAmbito' => $idEnAmbito,
      'Ambitos_idAmbitos' => $Ambitos_idAmbitos,
    ];

    $consulta->execute($parametros);

    return false;
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
