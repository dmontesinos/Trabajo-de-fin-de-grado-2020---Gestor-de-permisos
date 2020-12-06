<?php
include "models/conexionBD.php";
include "models/Ambitos/consultarAmbitos.php";
include "models\Objetos\consultarObjeto.php";
//include "models/Departamentos/consultarProfesoresDepartamento.php";
//include "models/Departamentos/delProfesoresDepartamento.php";
//include "models/Departamentos/consultarDepartamento.php";




if(isset($_POST['XXX']) && !empty($_POST['XXX'])){

  /*include "models/Departamentos/addProfesorDepartamento.php";

  if(delProfesoresDepartamento(conexionBD(), $_GET['idDept']) === false){
    foreach ($_POST["profesores"] as $profesor) {
      $error = addProfesorDepartamento(conexionBD(), $_GET['idDept'], $profesor);
    }
  } else {
    include_once 'controllers/portada.php';
    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=departamentos", function () {',
            'alert("S\'ha produït un error en l\'assignació.");',
        '});',
    '});',
    '</script>';
  }



  if($error === false){
    include_once 'controllers/portada.php';
    echo '<script type="text/javascript">',
    '$(document).ready(function(){',
        '$("#container-fluid").load("index.php?accion=departamentos", function () {',
            'alert("S\'han realitzat totes les assignacions correctament.");',
        '});',
    '});',
     '</script>';
  }

  unset($_POST["profesores"]);*/
} else {
  if(isset($_POST['id']) && !empty($_POST['id'])) {
    //echo $_POST['id'];

    $objeto = consultarObjeto(conexionBD(), $_POST['id']);
    $listaAmbitos = consultarAmbitos(conexionBD());

    include "views/Objetos/asignarPermisosObjeto.php";

    /*$listaAmbitos = consultarObjetosEnAmbito(conexionBD(), $_POST['id']);

    $listaProfDept = array();
    foreach ($listaProf as $profesorEnDepartamento) {
      array_push($listaProfDept, $profesorEnDepartamento["Profesores_niu"]);
    }

    $nombreDepartamento = consultarDepartamento(conexionBD(), $_POST['id']);
    $lista = consultarProfesores(conexionBD());
    include "views/Departamentos/asignarProfesorDepartamento.php"; */
  } else {
    /*if(isset($_GET['idDept'])){
      delProfesoresDepartamento(conexionBD(), $_GET['idDept']);
      //header('Location: index.php?accion=asignarProfesorDepartamento');
      include_once 'controllers/portada.php';
      echo '<script type="text/javascript">',
      '$(document).ready(function(){',
          '$("#container-fluid").load("index.php?accion=departamentos", function () {',
              'alert("S\'han eliminat totes les assignacions del grup.");',
          '});',
      '});',
      '</script>';

    } else {
      include_once 'controllers/portada.php';
    }*/
  }
}
?>
