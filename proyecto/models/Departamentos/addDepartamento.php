<?php
function addDepartamento($conexion, $id, $nombre, $acronimo) {
  try{
    $consulta = $conexion->prepare('INSERT INTO departamentos(idDepartamentos, nombre, acronimo) VALUES (:id, :nombre, :acronimo)');

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
