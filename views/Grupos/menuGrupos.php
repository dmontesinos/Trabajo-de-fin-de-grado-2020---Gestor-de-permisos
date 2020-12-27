<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Llistat de grups</h1>

  <a href="#" class="btn btn-success btn-icon-split" style="float: right" id="addGrupo">
    <span class="icon text-white-50">
      <i class="fa fa-plus" aria-hidden="true"></i>
    </span>
    <span class="text">Nou grup</span>
  </a>
</div>



<div class="card shadow mb-4">
  <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Seleccionar assignatura</h1>
  </div>

  <div class="card-body">
      <div class="row">
        <div class="col">
          <h5>Centre</h5>
          <select name="centro" class="custom-select" id="lista_centros" onChange="obtenerEstudios(this.value), obtenerAsignaturas(this.value);">
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
          <select name="estudio" id="lista_estudios" class="custom-select" onChange="obtenerAsignaturas(this.value);">
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
          <select name="asignatura" id="lista_asignaturas" class="custom-select" onChange="obtenerGrupos(this.value)";>
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
      <div class="row">
        <hr/>
        <div class="col" id="lista_grupos">
        </div>
      </div>
  </div>
</div>

<!-- Funciones personalizadas -->
<script>mostrarAddGrupo()</script>