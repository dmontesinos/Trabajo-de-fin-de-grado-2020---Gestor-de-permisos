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

function mostrarMenuProfesores() {
    $(document).ready(function(){
        $('#menuProfesores').click(function(){
            $('#container-fluid').load('index.php?accion=profesores', function () {
                console.log('Carga satisfactoria de profesores.');
            });
        });
    });
}

function mostrarMenuGrupos() {
    $(document).ready(function(){
        $('#menuGrupos').click(function(){
            $('#container-fluid').load('index.php?accion=grupos', function () {
                console.log('Carga satisfactoria de grupos.');
            });
        });
    });
}

function mostrarMenuDepartamentos() {
    $(document).ready(function(){
        $('#menuDepartamentos').click(function(){
            $('#container-fluid').load('index.php?accion=departamentos', function () {
                console.log('Carga satisfactoria de departamentos.');
            });
        });
    });
}

function mostrarMenuCargos() {
    $(document).ready(function(){
        $('#menuCargos').click(function(){
            $('#container-fluid').load('index.php?accion=cargos', function () {
                console.log('Carga satisfactoria de cargos.');
            });
        });
    });
}

function mostrarMenuObjetos() {
    $(document).ready(function(){
        $('#menuObjetos').click(function(){
            $('#container-fluid').load('index.php?accion=objetos', function () {
                console.log('Carga satisfactoria de objetos.');
            });
        });
    });
}

function mostrarMenuImportacion() {
    $(document).ready(function(){
        $('#menuImportacion').click(function(){
            $('#container-fluid').load('index.php?accion=importacion', function () {
                console.log('Carga satisfactoria de importación.');
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
                console.log('Carga satisfactoria de añadir asignatura.');
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

function mostrarModificarEstudio (id_asignatura) {
    $(document).ready(function(){
        $('#botonEditarEstudio-'+id_asignatura).click (function () {
            $.ajax({
                url: 'index.php?accion=editEstudio',
                data: {id: id_asignatura},
                type: 'post',
                success: function(output) {
                    $('#container-fluid').html(output);
                }
            });
        });
    });
}
// FIN ESTUDIOS
// ASIGNATURAS
function mostrarAddAsignatura() {
    $(document).ready(function(){
        $('#addAsignatura').click(function(){
            $('#container-fluid').load('index.php?accion=addAsignatura', function () {
                console.log('Carga satisfactoria de añadir asignatura.');
            });
        });
    });
}

function eliminarAsignatura (id_asignatura) {
    $(document).ready(function(){
        $('#botonBorrarAsignatura-'+id_asignatura).click (function () {
            $.ajax({
                url: 'index.php?accion=delAsignatura',
                data: {id: id_asignatura},
                type: 'post',
                success: function(output) {
                    $('#container-fluid').html(output);
                }
            });
            console.log('Asignatura borrada correctamente.');
        });
    });
}

function mostrarModificarAsignatura (id_asignatura) {
    $(document).ready(function(){
        $('#botonEditarAsignatura-'+id_asignatura).click (function () {
            $.ajax({
                url: 'index.php?accion=editAsignatura',
                data: {id: id_asignatura},
                type: 'post',
                success: function(output) {
                    $('#container-fluid').html(output);
                }
            });
        });
    });
}
// FIN ASIGNATURAS

// PROFESORES
function mostrarAddProfesor() {
    $(document).ready(function(){
        $('#addProfesor').click(function(){
            $('#container-fluid').load('index.php?accion=addProfesor', function () {
                console.log('Carga satisfactoria de añadir profesor.');
            });
        });
    });
}

function mostrarModificarProfesor (id_profesor) {
    $(document).ready(function(){
        $('#botonEditarProfesor-'+id_profesor).click (function () {
            $.ajax({
                url: 'index.php?accion=editProfesor',
                data: {id: id_profesor},
                type: 'post',
                success: function(output) {
                    $('#container-fluid').html(output);
                }
            });
        });
    });
}
function eliminarProfesor (id_profesor) {
    $(document).ready(function(){
        $('#botonBorrarProfesor-'+id_profesor).click (function () {
            $.ajax({
                url: 'index.php?accion=delProfesor',
                data: {id: id_profesor},
                type: 'post',
                success: function(output) {
                    $('#container-fluid').html(output);
                }
            });
            console.log('Profesor borrado correctamente.');
        });
    });
}
// FIN PROFESORES

// DEPARTAMENTOS
function mostrarAddDepartamento() {
    $(document).ready(function(){
        $('#addDepartamento').click(function(){
            $('#container-fluid').load('index.php?accion=addDepartamento', function () {
                console.log('Carga satisfactoria de añadir departamento.');
            });
        });
    });
}

function mostrarModificarDepartamento (id_departamento) {
    $(document).ready(function(){
        $('#botonEditarDepartamento-'+id_departamento).click (function () {
            $.ajax({
                url: 'index.php?accion=editDepartamento',
                data: {id: id_departamento},
                type: 'post',
                success: function(output) {
                    $('#container-fluid').html(output);
                }
            });
        });
    });
}
function eliminarDepartamento (id_departamento) {
    $(document).ready(function(){
        $('#botonBorrarDepartamento-'+id_departamento).click (function () {
            $.ajax({
                url: 'index.php?accion=delDepartamento',
                data: {id: id_departamento},
                type: 'post',
                success: function(output) {
                    $('#container-fluid').html(output);
                }
            });
            console.log('Departamento borrado correctamente.');
        });
    });
}

function mostrarAsignarDepartamento (id_departamento) {
    $(document).ready(function(){
        $('#botonAsignarProfesorDepartamento-'+id_departamento).click (function () {
            $.ajax({
                url: 'index.php?accion=asignarProfesorDepartamento',
                data: {id: id_departamento},
                type: 'post',
                success: function(output) {
                    $('#container-fluid').html(output);
                }
            });
            console.log('Carga satisfactoria de asignar profesores a departamento.');
        });
    });
}
// FIN DEPARTAMENTOS

// CARGOS
function mostrarAddCargo() {
    $(document).ready(function(){
        $('#addCargo').click(function(){
            $('#container-fluid').load('index.php?accion=addCargo', function () {
                console.log('Carga satisfactoria de añadir cargo.');
            });
        });
    });
}

function mostrarModificarCargo (id_cargo) {
    $(document).ready(function(){
        $('#botonEditarCargo-'+id_cargo).click (function () {
            $.ajax({
                url: 'index.php?accion=editCargo',
                data: {id: id_cargo},
                type: 'post',
                success: function(output) {
                    $('#container-fluid').html(output);
                }
            });
        });
    });
}
function eliminarCargo (id_cargo) {
    $(document).ready(function(){
        $('#botonBorrarCargo-'+id_cargo).click (function () {
            $.ajax({
                url: 'index.php?accion=delCargo',
                data: {id: id_cargo},
                type: 'post',
                success: function(output) {
                    $('#container-fluid').html(output);
                }
            });
            console.log('Cargo borrado correctamente.');
        });
    });
}

function mostrarAsignarCargo (id_cargo) {
    $(document).ready(function(){
        $('#botonAsignarProfesorCargo-'+id_cargo).click (function () {
            $.ajax({
                url: 'index.php?accion=asignarProfesorCargo',
                data: {id: id_cargo},
                type: 'post',
                success: function(output) {
                    $('#container-fluid').html(output);
                }
            });
            console.log('Carga satisfactoria de asignar profesores a cargo.');
        });
    });
}

function obtenerElementos(valor){
    $.ajax ({
      type: "POST",
      url: "models/Grupos/listaDependiente/get_elementos.php",
      data:'id_ambito='+valor,
      success: function(data) {
         $("#idEnAmbito").html(data);
      }
    });
  }

// FIN CARGOS

// GRUPOS
function obtenerEstudios(valor){
  $.ajax ({
    type: "POST",
    url: "models/Grupos/listaDependiente/get_estudio.php",
    data:'id_centro='+valor,
    success: function(data) {
       $("#lista_estudios").html(data);
    }
  });
}

function obtenerAsignaturas(valor){
  $.ajax({
   type: "POST",
   url: "models/Grupos/listaDependiente/get_asignatura.php",
   data:'id_estudio='+valor,
   success: function(data){
      $("#lista_asignaturas").html(data);
   }
  });
}

function obtenerGrupos(valor){
  $.ajax({
   type: "POST",
   url: "models/Grupos/listaDependiente/get_grupos.php",
   data:'id_asignatura='+valor,
   success: function(data){
      $("#lista_grupos").html(data);
   }
  });
}

function mostrarAddGrupo() {
    $(document).ready(function(){
        $('#addGrupo').click(function(){
            $('#container-fluid').load('index.php?accion=addGrupo', function () {
                console.log('Carga satisfactoria de añadir grupo.');
            });
        });
    });
}

function eliminarGrupo (id_asignatura, id_grupo, anio) {
    $(document).ready(function(){
        $.ajax({
            url: 'index.php?accion=delGrupo',
            data: {
                idAsignatura: id_asignatura,
                idGrupo: id_grupo,
                curso: anio,
            },
            type: 'post',
            success: function(output) {
                $('#container-fluid').html(output);
            }
        });
        console.log('Grupo borrado correctamente.');
    });
}
// FIN GRUPOS

// OBJETOS
function mostrarAddObjeto() {
    $(document).ready(function(){
        $('#addObjeto').click(function(){
            $('#container-fluid').load('index.php?accion=addObjeto', function () {
                console.log('Carga satisfactoria de añadir objeto.');
            });
        });
    });
}

function eliminarObjeto (id_objeto) {
    $(document).ready(function(){
        $('#botonBorrarObjeto-'+id_objeto).click (function () {
            $.ajax({
                url: 'index.php?accion=delObjeto',
                data: {id: id_objeto},
                type: 'post',
                success: function(output) {
                    $('#container-fluid').html(output);
                }
            });
            console.log('Objeto borrado correctamente.');
        });
    });
}

function mostrarModificarObjeto (id_objeto) {
    $(document).ready(function(){
        $('#botonEditarObjeto-'+id_objeto).click (function () {
            $.ajax({
                url: 'index.php?accion=editObjeto',
                data: {id: id_objeto},
                type: 'post',
                success: function(output) {
                    $('#container-fluid').html(output);
                }
            });
        });
    });
}

function mostrarAsignarPermisosObjeto (id_objeto) {
    $(document).ready(function(){
        $('#botonAsignarPermisosObjeto-'+id_objeto).click (function () {
            $.ajax({
                url: 'index.php?accion=asignarPermisosObjeto',
                data: {id: id_objeto},
                type: 'post',
                success: function(output) {
                    $('#container-fluid').html(output);
                }
            });
            console.log('Carga satisfactoria de asignar permisos a objeto.');
        });
    });
}

function submitPermisosObjeto (id_objeto) {
    $(document).ready(function(){
      $.ajax({
          url: 'index.php?accion=asignarPermisosObjeto',
          data:  $('#submitPermisosObjeto').serialize()+"&idObjeto="+id_objeto,
          type: 'post',
          success: function(output) {
              $('#container-fluid').html(output);
          }
      });
      console.log('Carga satisfactoria de asignar permisos a objeto.');
    });
}

// FIN OBJETOS
