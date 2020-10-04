<?php

//session_start();
//session_destroy();

$accion = $_GET['accion'] ?? null;

switch ($accion) {
    case 'tablero':
        require __DIR__.'/controllers/prueba.php';
        break;
    case 'centros':
        require __DIR__.'/controllers/centros.php';
        break;
    default:
        require __DIR__ .'/controllers/portada.php';
        break;
}
?>