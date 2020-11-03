function mostrarContenidoPricipal () {
    $(document).ready(function(){
        $('#tablero').click(function(){
            $('#container-fluid').load('index.php?accion=tablero', function () {
                console.log('Carga satisfactoria!');
            });
        });
    });
}

// MENUS
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
// FIN MENUS
// CENTROS
function mostrarAddCentro() {
    $(document).ready(function(){
        $('#addCentro').click(function(){
            $('#container-fluid').load('index.php?accion=addCentro', function () {
                console.log('Carga satisfactoria de añadir centro.');
            });
        });
    });
}

function eliminarCentro (id_centro) {
    $(document).ready(function(){
        $('#botonBorrarCentro-'+id_centro).click (function () {
            $.ajax({
                url: 'index.php?accion=delCentro',
                data: {id: id_centro},
                type: 'post',
                success: function(output) {
                    $('#container-fluid').html(output);
                }
            });
            console.log('Centro borrado correctamente.');
        });
    });
}

function mostrarModificarCentro (id_centro) {
    $(document).ready(function(){
        $('#botonEditarCentro-'+id_centro).click (function () {
            $.ajax({
                url: 'index.php?accion=editCentro',
                data: {id: id_centro},
                type: 'post',
                success: function(output) {
                    $('#container-fluid').html(output);
                }
            });
        });
    });
}
// FIN CENTROS
// ESTUDIOS
function mostrarAddEstudio() {
    $(document).ready(function(){
        $('#addEstudio').click(function(){
            $('#container-fluid').load('index.php?accion=addEstudio', function () {
                console.log('Carga satisfactoria de añadir estudio.');
            });
        });
    });
}

function eliminarEstudio (id_estudio) {
    $(document).ready(function(){
        $('#botonBorrarEstudio-'+id_estudio).click (function () {
            $.ajax({
                url: 'index.php?accion=delEstudio',
                data: {id: id_estudio},
                type: 'post',
                success: function(output) {
                    $('#container-fluid').html(output);
                }
            });
            console.log('Estudio borrado correctamente.');
        });
    });
}

function mostrarModificarEstudio (id_estudio) {
    $(document).ready(function(){
        $('#botonEditarEstudio-'+id_estudio).click (function () {
            $.ajax({
                url: 'index.php?accion=editEstudio',
                data: {id: id_estudio},
                type: 'post',
                success: function(output) {
                    $('#container-fluid').html(output);
                }
            });
        });
    });
}
// FIN ESTUDIOS
