<?php
function consultarAdmin($conexion, $niu) {
  try{
    
    $consulta = $conexion->prepare('SELECT * FROM administradores WHERE niu = :niu');
    $parametros = [
      'niu' => $niu,
    ];

    $consulta->execute($parametros);
    $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);

    if(isset($consulta[0]['niu'])){ //Comprobamos si existe o no en la tabla.
        return true;
    } else {
        return false;
    }
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
