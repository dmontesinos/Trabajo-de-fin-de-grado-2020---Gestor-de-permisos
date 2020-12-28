<?php
function addProfesorCargo($conexion, $id_cargo, $id_profesor) {
  try{
    $consulta = $conexion->prepare('INSERT INTO cargos_has_profesores (Cargos_idCargos, Profesores_niu) VALUES (:id_cargo, :id_profesor)');

    $parametros = [
      'id_cargo' => $id_cargo,
      'id_profesor' => $id_profesor,
    ];

    $consulta->execute($parametros);

    return false;
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
