<?php
function consultarCursos($conexion) {
  try{
    $consulta = $conexion->prepare('SELECT * FROM anio');
    
    $consulta->execute();
    $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);

    return($consulta);
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
