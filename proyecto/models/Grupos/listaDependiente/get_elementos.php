<?php

include 'config.php';

if(!empty($_POST["id_ambito"]))
{
  $sql = 'SELECT * FROM ambitos WHERE idAmbitos = '.$_POST["id_ambito"];
  $consulta_nombre = $link->query($sql);
  $nombre_ambito = $consulta_nombre->fetch_object();

  if($nombre_ambito->nombre == "Universidad"){
    echo "<option value='Universitat Autònoma de Barcelona'>Universitat Autònoma de Barcelona</option>";
  } else {
    $sql = "SELECT * FROM ".$nombre_ambito->nombre;
    $consulta_elementos = $link->query($sql);

    ?>
      <option value="">Selecciona un element</option>
    <?php

    while($elemento = $consulta_elementos->fetch_array())
    {
      ?>
        <option value="<?php echo $elemento[0]; ?>"><?php echo $elemento[1]; ?></option>
      <?php
    }
  }

   
}
?>
