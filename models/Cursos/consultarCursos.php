<?php
function consultarCursos($conexion) {
  try{
    $consulta = $conexion->prepare('SELECT * FROM Anio');
    
    $consulta->execute();
    $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);

    return($consulta);
  }catch(PDOException $e){
      return "Error: " . $e->getMessage();
  }
}
?>
