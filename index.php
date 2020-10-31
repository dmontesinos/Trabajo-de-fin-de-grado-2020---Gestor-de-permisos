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
    case 'delCentro':
        require __DIR__.'/controllers/Centros/delCentro.php';
        break;


    // Gestión de Estudios
    case 'estudios':
        require __DIR__.'/controllers/estudios.php';
        break;


    // Gestión de Asignaturas
    case 'asignaturas':
        require __DIR__.'/controllers/asignaturas.php';
        break;


    default:
        require __DIR__ .'/controllers/portada.php';
        break;
}
?>
