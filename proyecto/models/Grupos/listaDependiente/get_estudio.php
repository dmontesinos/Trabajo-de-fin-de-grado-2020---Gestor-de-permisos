<?php

include 'config.php';

if(!empty($_POST["id_centro"]))
{
   $sql ="SELECT idEstudio, nombre FROM estudios WHERE Centros_idCentros = '" . $_POST["id_centro"] . "'";

 	 $consulta_estudios = $link->query($sql);

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
