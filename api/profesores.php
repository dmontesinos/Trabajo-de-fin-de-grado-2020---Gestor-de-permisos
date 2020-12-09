<?php

    //echo 'Informacion recibida: '. file_get_contents('php://input');
    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
            $_POST = json_decode(file_get_contents('php://input'), true);
            echo "Has enviado: " . $_POST['nombre'];
        break;
        case 'GET':
            echo "El parámetro GET es: " . $_GET['niu'];
        break;
        case 'PUT':
            echo "Actualizar profesor";
        break;
        case 'DELETE':
            echo "Eliminar profesor";
        break;
    }
?>