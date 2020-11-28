<?php
  include 'listaDependiente/config.php';
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Llistat de grups</h1>

  <a href="#" class="btn btn-success btn-icon-split" style="float: right" id="addEstudio">
    <span class="icon text-white-50">
      <i class="fa fa-plus" aria-hidden="true"></i>
    </span>
    <span class="text">Nou grup</span>
  </a>
</div>

<script>
   function obtenerEstudios(valor){
     $.ajax ({
      type: "POST",
      url: "listaDependiente/get_estudio.php",
      data:'id_centro='+valor,
      success: function(data) {
         $("#lista_estudios").html(data);
      }
     });
   }

  function obtenerAsignaturas(valor){
    $.ajax({
     type: "POST",
     url: "listaDependiente/get_asignatura.php",
     data:'id_estudio='+valor,
     success: function(data){
        $("#lista_asignaturas").html(data);
     }
    });
  }
</script>

<?php
  $consulta_centros = $link->query("select idCentro as 'valor', nombre as 'descripcion' from Centros order by nombre");
  $consulta_estudios = $link->query("select idEstudio as 'valor', nombre as 'descripcion' from Estudios order by nombre");
  $consulta_asignaturas = $link->query("select idAsignaturas as 'valor', nombre as 'descripcion' from Asignaturas order by nombre");
?>

<div class="card shadow mb-4">
  <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Seleccionar assignatura</h1>
  </div>

  <div class="card-body">
    <form action="index.php?accion=XXXXXXXXXXXXXXXXXXXXXXXX" method="post">
      <div class="row">
        <div class="col">
          <h5>Centre</h5>
          <select name="centro" class="form-control" id="lista_centros" onChange="obtenerEstudios(this.value), obtenerAsignaturas(this.value);">
  					<option value=''>Seleccionar centre</option>
  						<?php
  							while($row= $consulta_centros->fetch_object())
  							{
  								echo "<option value='".$row->valor."'>".$row->descripcion."</option>";
  							}
  						?>
  				</select>
        </div>
        <div class="col">
          <h5>Estudi</h5>
          <select name="estudio" id="lista_estudios" class="form-control" onChange="obtenerAsignaturas(this.value);">
  					<option value=''>Seleccionar estudi</option>
  						<?php
  							while($row= $consulta_estudios->fetch_object())
  						   {
  							  echo "<option value='".$row->valor."'>".$row->descripcion."</option>";
  						   }
  						?>
  				</select>
        </div>
        <div class="col">
          <h5>Assignatura</h5>
          <select name="asignatura" id="lista_asignaturas" class="form-control">
  					<option value=''>Seleccionar assignatura</option>
  						<?php
  							while($row= $consulta_asignaturas->fetch_object())
  						   {
  							  echo "<option value='".$row->valor."'>".$row->descripcion."</option>";
  						   }
  						?>
  				</select>
        </div>
      </div>
      <input type="submit" class="btn btn-primary" style="margin-top: 10px; align=right" onclick="editarProfesor()" id="editProfesor"></input>
    </form>
  </div>
</div>

<!-- Funciones personalizadas -->
<script src="js/tablas/tablaEstudios.js"></script>
<script>mostrarAddEstudio()</script>
