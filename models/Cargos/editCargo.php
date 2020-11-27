<?php
function editarCargo($conexion, $id, $descripcion, $idEnAmbito, $Ambitos_idAmbitos) {
  try{

    $consulta = $conexion->prepare('UPDATE cargos SET descripcion = :descripcion, idEnAmbito = :idEnAmbito, Ambitos_idAmbitos = :Ambitos_idAmbitos WHERE idCargos = :id');
    $parametros = [
      'id' => $id,
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
