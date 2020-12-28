<?php
function consultarObjetoPorNombre($conexion, $nombre) {
  try{

    $consulta = $conexion->prepare('SELECT * FROM objeto WHERE nombre = :nombre');
    $parametros = [
      'nombre' => $nombre,
    ];

    $consulta->execute($parametros);
    $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);

    return($consulta);
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
