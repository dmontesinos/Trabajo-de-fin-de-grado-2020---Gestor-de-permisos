<?php

//session_start();
//session_destroy();

$accion = $_GET['accion'] ?? null;

switch ($accion) {
    case 'principal':
        require __DIR__.'/controllers/prueba.php';
        echo "He entrado";
        break;

    default:
        require __DIR__ .'/controllers/portada.php';
        break;
}
?>