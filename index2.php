<?php
  include "models/Ambitos/consultarIdEnAmbito.php";
  include "models/conexionBD.php";


  $elemento = consultarIdEnAmbito(conexionBD(), 115, 1);

  //print_r($elemento);
  echo ($elemento[0]['nombre'])
?>
