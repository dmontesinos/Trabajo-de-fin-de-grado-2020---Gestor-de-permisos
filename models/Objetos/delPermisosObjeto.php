<?php
function borrarPermisosObjeto($conexion, $id) {
  try{
    $consulta = $conexion->prepare('DELETE FROM permisos WHERE Objeto_idObjeto = :id');
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
