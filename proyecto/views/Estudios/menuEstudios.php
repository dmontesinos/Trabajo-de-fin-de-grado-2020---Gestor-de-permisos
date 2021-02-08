<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Llistat d'estudis</h1>

  <a href="#" class="btn btn-success btn-icon-split" style="float: right" id="addEstudio">
    <span class="icon text-white-50">
      <i class="fa fa-plus" aria-hidden="true"></i>
    </span>
    <span class="text">Nou estudi</span>
  </a>
</div>


<div class="table-responsive">
	<table class="table table-bordered table-hover" id="dataTableEstudios" width="100%" cellspacing="0">
  		<thead>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Acrònim</th>
              <th>Centre</th>
              <th>Actiu</th>
              <th>Tipus</th>
              <th style="width:10%">Opcions</th>
            </tr>
      	</thead>
      	<tbody>
      		<?php foreach ($lista as $estudio): ?>
	            <tr>
  		          <td><?php echo htmlspecialchars($estudio['idEstudio']);?></td>
  		          <td><?php echo htmlspecialchars($estudio['nombre']);?></td>
  		          <td><?php echo htmlspecialchars($estudio['acronimo']);?></td>
                <td><?php echo htmlspecialchars($estudio['Centros_idCentros']);?></td>
                <td>
                  <?php
                  if($estudio['activo']){
                    echo "Si";
                  } else {
                    echo "No";
                  }
                  ?>
                </td>
                <td><?php echo $estudio['tipo'];?></td>
                <td>
                  <div class="dropdown mb-0" style="text-align: center;">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-info-circle"></i>
                      <span class="text">Detalls</span>
                    </button>
                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                      <a id="botonEditarEstudio-<?php echo $estudio['idEstudio'];?>" class="dropdown-item" href="#">Modificar</a>
                      <div class="dropdown-divider"></div>
                      <a id="botonBorrarEstudio-<?php echo $estudio['idEstudio'];?>" class="dropdown-item" href="#">Eliminar</a>
                      <script>eliminarEstudio(<?php echo $estudio['idEstudio'];?>)</script>
                      <script>mostrarModificarEstudio(<?php echo $estudio['idEstudio'];?>)</script>
                    </div>
                  </div>
                </td>
	            </tr>
			<?php endforeach; ?>
  		</tbody>
	</table>
</div>

<!-- Funciones personalizadas -->
<script src="js/tablas/tablaEstudios.js"></script>
<script>mostrarAddEstudio()</script>
