<?php
include "models/conexionBD.php";

include 'listaDependiente/config.php';
include_once "models/Grupos/inicializarGrupos.php";
include "views/Grupos/menuGrupos.php";
?>

<script>
  $(document).ready(function(){
    obtenerEstudios(-1);
    obtenerAsignaturas(-1);
  });
</script>
