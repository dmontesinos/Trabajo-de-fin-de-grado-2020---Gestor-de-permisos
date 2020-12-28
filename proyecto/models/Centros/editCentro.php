<?php
function editarCentro($conexion, $id, $nombre, $acronimo) {
  try{

    $consulta = $conexion->prepare('UPDATE centros SET nombre = :nombre, acronimo = :acronimo WHERE idCentro = :id');
    $parametros = [
      'id' => $id,
      'nombre' => $nombre,
      'acronimo' => $acronimo,
    ];

    $consulta->execute($parametros);

    return false;
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
