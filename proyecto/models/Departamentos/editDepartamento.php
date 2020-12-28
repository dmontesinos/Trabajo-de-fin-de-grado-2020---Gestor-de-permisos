<?php
function editarDepartamento($conexion, $id, $nombre, $acronimo) {
  try{

    $consulta = $conexion->prepare('UPDATE departamentos SET nombre = :nombre, acronimo = :acronimo WHERE idDepartamentos = :id');
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
