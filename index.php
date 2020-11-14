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
    /*case 'editAsignatura':
        require __DIR__.'/controllers/Asignaturas/editAsignatura.php';
        break;
    case 'delAsignatura':
        require __DIR__.'/controllers/Asignaturas/delAsignatura.php';
        break;*/


    default:
        require __DIR__ .'/controllers/portada.php';
        break;
}
?>
