<?php

include 'config.php';

if(!empty($_POST["id_estudio"]))
{
   $sql ="SELECT a.idAsignaturas, a.nombre FROM asignaturas as a
   INNER JOIN asignaturas_has_estudios as ae
   ON ae.Asignaturas_idAsignaturas = a.idAsignaturas
   INNER JOIN estudios as e
   ON e.idEstudio = ae.Estudios_idEstudios
   INNER JOIN centros as c
   ON c.idCentro = ae.Estudio_Centros_idCentros
   WHERE e.idEstudio = '" . $_POST["id_estudio"] . "'";

 	 $consulta_asignaturas = $link->query($sql);

   ?>
     <option value="">Seleccionar assignatura</option>
   <?php

   while($asignatura = $consulta_asignaturas->fetch_object())
   {
	   ?>
		  <option value="<?php echo $asignatura->idAsignaturas; ?>"><?php echo $asignatura->nombre; ?></option>
	   <?php
   }
}
?>
