<?php
function consultarCentro($connexion, $id) {
  try{

    $consulta = $connexion->prepare('SELECT * FROM centros WHERE idCentro = :id');
    $parametros = [
      'id' => $id,
    ];

    $consulta->execute($parametros);
    $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);

    return($consulta);
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
