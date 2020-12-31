<?php
function consultarPermisosObjeto($conexion, $idObjeto) {
  try{

    $consulta = $conexion->prepare('SELECT * FROM permisos WHERE Objeto_idObjeto = :idObjeto');
    $parametros = [
      'idObjeto' => $idObjeto,
    ];

    $consulta->execute($parametros);
    $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);

    return($consulta);
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
