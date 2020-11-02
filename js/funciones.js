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

function mostrarAddCentro() {
    $(document).ready(function(){
        $('#addCentro').click(function(){
            $('#container-fluid').load('index.php?accion=addCentro', function () {
                console.log('Carga satisfactoria de añadir centro.');
            });
        });
    });
}

/*function mostrarCentros() {
  $(document).ready(function(){
      $('#container-fluid').load('index.php?accion=centros', function () {
          console.log('Carga satisfactoria de centros.');
      });
  });
}*/

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

/*function editarCentro (id_centro, nombre_centro, acronimo_centro) {
    $(document).ready(function(){
        $('#editCentro').click (function () {
            $.ajax({
                url: 'index.php?accion=editCentro',
                data: {
                  idCentro: id_centro,
                  nombre: nombre_centro,
                  acronimo: acronimo_centro,
                },
                type: 'post',
                success: function(output) {
                    $('#container-fluid').html(output);
                }
            });
            console.log('Centro editado correctamente.');
        });
    });
}*/
