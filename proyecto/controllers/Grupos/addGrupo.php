<?php
require_once "models/conexionBD.php";
require_once "models/Grupos/addGrupo.php";


if(isset($_POST['grupo']) && !empty($_POST['grupo']) && isset($_POST['curso']) && !empty($_POST['curso']) 
    && isset($_POST['asignatura']) && !empty($_POST['asignatura'])){

  $grupo = $_POST['grupo'];
  $curso = $_POST['curso'];
  $asignatura = $_POST['asignatura'];
  $ocupacion = $_POST['ocupacion'];

  unset($_POST['grupo']);
  unset($_POST['curso']);
  unset($_POST['asignatura']);
  unset($_POST['ocupacion']);


  $error = addGrupo(conexionBD(), $grupo, $curso, $asignatura, $ocupacion);

  if($error === false){
    include_once 'controllers/portada.php';

    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=addGrupo", function () {',
            'alert("El grup s\'ha afegit correctament.");',
        '});',
    '});',
     '</script>';

  } else {

  include_once 'controllers/portada.php';

  echo '<script type="text/javascript">',
  '$(document).ready(function(){',
      '$("#container-fluid").load("index.php?accion=addGrupo", function () {',
          'alert("El grup no s\'ha pogut afegir. Error: '.$error.'");',
      '});',
  '});',
   '</script>';
  }

} else {
  require_once "models/Asignaturas/consultarAsignaturas.php";
  require_once "models/Cursos/consultarCursos.php";
  $cursos = consultarCursos(conexionBD());
  $asignaturas = consultarAsignaturas(conexionBD());
  require_once "views/Grupos/addGrupo.php";
}

?>
