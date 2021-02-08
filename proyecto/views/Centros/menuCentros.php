<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Llistat de centres</h1>
  <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->

  <a href="#" class="btn btn-success btn-icon-split" style="float: right" id="addCentro">
    <span class="icon text-white-50">
      <i class="fa fa-plus" aria-hidden="true"></i>
    </span>
    <span class="text">Nou centre</span>
  </a>
</div>

<div class="table-responsive" style="width: 100%; margin: 0px auto">
	<table class="table table-bordered table-hover table-compact" id="dataTableCentros" width="100%" cellspacing="0">
  		<thead>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Acrònim</th>
              <th style="width:10%">Opcions</th>

            </tr>
      	</thead>
      	<tbody>
      		<?php foreach ($lista as $centro): ?>
	            <tr>
  		          <td><?php echo htmlspecialchars($centro['idCentro']);?></td>
  		          <td><?php echo htmlspecialchars($centro['nombre']);?></td>
  		          <td><?php echo htmlspecialchars($centro['acronimo']);?></td>
                <td>
                  <div class="dropdown mb-0" style="text-align: center;">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-info-circle"></i>
                      <span class="text">Detalls</span>
                    </button>
                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                      <a id="botonEditarCentro-<?php echo $centro['idCentro'];?>" class="dropdown-item" href="#">Modificar</a>
                      <div class="dropdown-divider"></div>
                      <a id="botonBorrarCentro-<?php echo $centro['idCentro'];?>" class="dropdown-item" href="#">Eliminar</a>
                      <script>eliminarCentro(<?php echo $centro['idCentro'];?>)</script>
                      <script>mostrarModificarCentro(<?php echo $centro['idCentro'];?>)</script>
                    </div>
                  </div>
                </td>
	            </tr>
			<?php endforeach; ?>
  		</tbody>
	</table>
</div>

<!-- Funciones personalizadas -->
<script src="js/tablas/tablaCentros.js"></script>
<script>mostrarAddCentro()</script>
