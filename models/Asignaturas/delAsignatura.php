<?php
function borrarAsignatura($connexion, $id) {
  try{
    $consulta = $connexion->prepare('DELETE FROM asignaturas WHERE idAsignaturas = :id');
    $parametros = [
      'id' => $id,
    ];

    $consulta->execute($parametros);

    return false;
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
