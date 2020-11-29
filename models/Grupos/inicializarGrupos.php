<?php
  $consulta_centros = $link->query("select idCentro as 'valor', nombre as 'descripcion' from Centros order by nombre");
  $consulta_estudios = $link->query("select idEstudio as 'valor', nombre as 'descripcion' from Estudios order by nombre");
  $consulta_asignaturas = $link->query("select idAsignaturas as 'valor', nombre as 'descripcion' from Asignaturas order by nombre");
?>
