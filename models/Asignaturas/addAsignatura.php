<?php
function addAsignatura($connexion, $id, $nombre) {
  try{
    $consulta = $connexion->prepare('INSERT INTO asignaturas(idAsignaturas, nombre) VALUES (:id, :nombre)');

    $parametros = [
      'id' => $id,
      'nombre' => $nombre,
    ];

    $consulta->execute($parametros);

    return false;
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
