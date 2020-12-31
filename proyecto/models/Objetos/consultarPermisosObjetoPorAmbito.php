<?php
function consultarPermisosObjetoPorAmbito($conexion, $idObjeto, $idAmbito) {
  try{

    $consulta = $conexion->prepare('SELECT * FROM permisos 
                                    WHERE Objeto_idObjeto = :idObjeto 
                                    AND Ambitos_idAmbitos = :idAmbito');
    $parametros = [
      'idObjeto' => $idObjeto,
      'idAmbito' => $idAmbito,
    ];

    $consulta->execute($parametros);
    $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);

    return($consulta);
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
