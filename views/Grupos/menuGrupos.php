<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Llistat de grups per assignatura</h1>
  <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->

  <a href="#" class="btn btn-success btn-icon-split" style="float: right" id="addGrupo">
    <span class="icon text-white-50">
      <i class="fa fa-plus" aria-hidden="true"></i>
    </span>
    <span class="text">Nou grup</span>
  </a>
</div>



<div class="form-group col-md-3">
  <label>Paises:</label>
  <select name="pais" class="form-control" id="lista_paises" onChange="obtenerCiudades(this.value);">
    <option value=''>Seleccionar País</option>
    <?php
        while($row= $consulta_paises->fetch_object())
        {
    	     echo "<option value='".$row->valor."'>".$row->descripcion."</option>";
        }
    ?>
  </select>
</div>

<div class="form-group col-md-6">
  <label>Ciudades:</label>
  <select name="ciudad" id="lista_ciudades" class="form-control">
  	<option value=''>Seleccionar Ciudad</option>
  	<?php
      while($row= $consulta_ciudades->fetch_object())
      {
        echo "<option value='".$row->valor."'>".$row->descripcion."</option>";
      }
    ?>
  </select>
</div>







<!-- Funciones personalizadas -->
<script src="js/tablas/tablaGrupos.js"></script>
<script>mostrarAddGrupos()</script>
