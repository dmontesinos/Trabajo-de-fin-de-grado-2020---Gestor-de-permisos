<?php
  $consulta_centros = $link->query("select idCentro as 'valor', nombre as 'descripcion' from centros order by nombre");
  $consulta_estudios = $link->query("select idEstudio as 'valor', nombre as 'descripcion' from estudios order by nombre");
  $consulta_asignaturas = $link->query("select idAsignaturas as 'valor', nombre as 'descripcion' from asignaturas order by nombre");
?>
