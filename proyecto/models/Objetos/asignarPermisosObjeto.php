<?php
function asignarPermisosObjeto($conexion, $nivel, $idObjeto, $idAmbito) {
  try{
    $consulta = $conexion->prepare('INSERT INTO Permisos(nivel, Objeto_idObjeto, Ambitos_idAmbitos) VALUES (:nivel, :idObjeto, :idAmbito)');

    $parametros = [
      'nivel' => $nivel,
      'idObjeto' => $idObjeto,
      'idAmbito' => $idAmbito,
    ];

    $consulta->execute($parametros);

    return false;
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
