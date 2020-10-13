function mostrarContenidoPricipal () {
    $(document).ready(function(){
        $('#tablero').click(function(){
            $('#container-fluid').load('index.php?accion=tablero', function () {
                console.log('Carga satisfactoria!');
            });
        });
    });
}

function mostrarMenuCentros() {
    $(document).ready(function(){
        $('#menuCentros').click(function(){
            $('#container-fluid').load('index.php?accion=centros', function () {
                console.log('Carga satisfactoria de centros.');
            });
        });
    });
}

function mostrarMenuEstudios() {
    $(document).ready(function(){
        $('#menuEstudios').click(function(){
            $('#container-fluid').load('index.php?accion=estudios', function () {
                console.log('Carga satisfactoria de estudios.');
            });
        });
    });
}

function mostrarMenuAsignaturas() {
    $(document).ready(function(){
        $('#menuAsignaturas').click(function(){
            $('#container-fluid').load('index.php?accion=asignaturas', function () {
                console.log('Carga satisfactoria de asignaturas.');
            });
        });
    });
}