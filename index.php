<?php

//session_start();
//session_destroy();

$accion = $_GET['accion'] ?? null;

switch ($accion) {
    case 'tablero':
        require __DIR__.'/controllers/prueba.php';
        break;

    // Gestión de Centros
    case 'centros':
        require __DIR__.'/controllers/Centros/centros.php';
        break;
    case 'addCentro':
        require __DIR__.'/controllers/Centros/addCentro.php';
        break;
    case 'editCentro':
        require __DIR__.'/controllers/Centros/editCentro.php';
        break;
    case 'delCentro':
        require __DIR__.'/controllers/Centros/delCentro.php';
        break;


    // Gestión de Estudios
    case 'estudios':
        require __DIR__.'/controllers/Estudios/estudios.php';
        break;
    case 'addEstudio':
        require __DIR__.'/controllers/Estudios/addEstudio.php';
        break;
    case 'editEstudio':
        require __DIR__.'/controllers/Estudios/editEstudio.php';
        break;
    case 'delEstudio':
        require __DIR__.'/controllers/Estudios/delEstudio.php';
        break;


    // Gestión de Asignaturas
    case 'asignaturas':
        require __DIR__.'/controllers/Asignaturas/asignaturas.php';
        break;
    case 'addAsignatura':
        require __DIR__.'/controllers/Asignaturas/addAsignatura.php';
        break;
    case 'editAsignatura':
        require __DIR__.'/controllers/Asignaturas/editAsignatura.php';
        break;
    case 'delAsignatura':
        require __DIR__.'/controllers/Asignaturas/delAsignatura.php';
        break;

    // Gestión de profesores
    case 'profesores':
        require __DIR__.'/controllers/Profesores/profesores.php';
        break;
    case 'addProfesor':
        require __DIR__.'/controllers/Profesores/addProfesor.php';
        break;
    case 'editProfesor':
        require __DIR__.'/controllers/Profesores/editProfesor.php';
        break;
    case 'delProfesor':
        require __DIR__.'/controllers/Profesores/delProfesor.php';
        break;

    // Gestión de grupos
    case 'grupos':
        require __DIR__.'/controllers/Grupos/grupos.php';
        break;
    /*case 'addProfesor':
        require __DIR__.'/controllers/Profesores/addProfesor.php';
        break;
    case 'editProfesor':
        require __DIR__.'/controllers/Profesores/editProfesor.php';
        break;
    case 'delProfesor':
        require __DIR__.'/controllers/Profesores/delProfesor.php';
        break;*/

    // Gestión de departamentos
    case 'departamentos':
        require __DIR__.'/controllers/Departamentos/departamentos.php';
        break;
    case 'addDepartamento':
        require __DIR__.'/controllers/Departamentos/addDepartamento.php';
        break;
    case 'editDepartamento':
        require __DIR__.'/controllers/Departamentos/editDepartamento.php';
        break;
    case 'delDepartamento':
        require __DIR__.'/controllers/Departamentos/delDepartamento.php';
        break;
    case 'asignarProfesorDepartamento':
        require __DIR__.'/controllers/Departamentos/asignarProfesorDepartamento.php';
        break;

    // Gestión de cargos
    case 'cargos':
        require __DIR__.'/controllers/Cargos/cargos.php';
        break;
    case 'addCargo':
        require __DIR__.'/controllers/Cargos/addCargo.php';
        break;
    case 'editCargo':
        require __DIR__.'/controllers/Cargos/editCargo.php';
        break;
    case 'delCargo':
        require __DIR__.'/controllers/Cargos/delCargo.php';
        break;
    case 'asignarProfesorCargo':
        require __DIR__.'/controllers/Cargos/asignarProfesorCargo.php';
        break;


    // Gestión de objetos
    case 'objetos':
        require __DIR__.'/controllers/Objetos/objetos.php';
        break;
    case 'addObjeto':
        require __DIR__.'/controllers/Objetos/addObjeto.php';
        break;
    case 'editObjeto':
        require __DIR__.'/controllers/Objetos/editObjeto.php';
        break;
    case 'delObjeto':
        require __DIR__.'/controllers/Objetos/delObjeto.php';
        break;

    default:
        require __DIR__ .'/controllers/portada.php';
        break;
}
?>
