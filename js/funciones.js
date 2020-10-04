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
                console.log('Carga satisfactoria!');
            });
        });
    });
}