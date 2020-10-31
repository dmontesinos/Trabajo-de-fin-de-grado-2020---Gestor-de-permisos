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
        $('#botonBorrar-'+id_centro).click (function () {
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
