<?php
function consultarProfesoresCargo($conexion, $id_cargo){
  try{

    $consultar_profesores = $conexion->prepare("SELECT Profesores_niu FROM cargos_has_profesores WHERE Cargos_idCargos = :id_cargo");
    $parametros = [
      'id_cargo' => $id_cargo,
    ];

    $consultar_profesores->execute($parametros);
    $consultar_profesores = $consultar_profesores->fetchAll(PDO::FETCH_ASSOC);

    return($consultar_profesores);
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
