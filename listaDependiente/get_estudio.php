<?php

include 'config.php';

//pasamos id del estudio
if(!empty($_POST["id_centro"]))
{
   $sql ="SELECT idEstudio, nombre FROM Estudios WHERE Centros_idCentros = '" . $_POST["id_centro"] . "'";

 	 $consulta_estudios = $link->query($sql);

   //construimos lista nueva dependiente
   ?>
     <option value="">Seleccionar estudi</option>
   <?php

   while($estudio= $consulta_estudios->fetch_object())
   {
	   ?>
		  <option value="<?php echo $estudio->idEstudio; ?>"><?php echo $estudio->nombre; ?></option>
	   <?php
   }
}
?>
