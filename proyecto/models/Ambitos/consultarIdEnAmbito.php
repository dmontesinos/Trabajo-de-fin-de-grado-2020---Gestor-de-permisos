<?php
function consultarIdEnAmbito($conexion, $idTupla, $idAmbito) {
  try{

    /*
    Comprobación del nombre de la PK en función del ámbito.
    */
    $consultaNombreIdTabla = $conexion->prepare('SELECT * FROM ambitos WHERE idAmbitos = :ambito');
    $parametros = [
      'ambito' => $idAmbito,
    ];

    $consultaNombreIdTabla->execute($parametros);
    $consultaNombreIdTabla = $consultaNombreIdTabla->fetchAll(PDO::FETCH_ASSOC);

    //return($consultaNombreIdTabla);
    $nombrePKTabla = $consultaNombreIdTabla[0]['tabla']; //Nombre del PK de la tabla
    $nombreAmbito = $consultaNombreIdTabla[0]['nombre'];

    /*
    Consultar el item concreto de la tabla(ambito) concreto.
    */
    /*echo "ID TUPLA: ".$idTupla."</br>";
    echo "NOMBRE AMBITO: ".$nombreAmbito."</br>";
    echo "Nombre PK Tabla: ".$nombrePKTabla."</br>";*/

    $consulta = $conexion->prepare("SELECT * FROM ".strtolower($nombreAmbito)." WHERE ".$nombrePKTabla." = ".$idTupla);
    $parametros = [
      'idTupla' => $idTupla,
      'ambito' => $nombreAmbito,
      'nombrePKTabla' => $nombrePKTabla,
    ];

    $consulta->execute($parametros);
    $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);

    return($consulta);
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
