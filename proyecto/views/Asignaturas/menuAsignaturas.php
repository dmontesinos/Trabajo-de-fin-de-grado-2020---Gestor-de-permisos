<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Llistat d'assignatures</h1>


  <a href="#" class="btn btn-success btn-icon-split" style="float: right" id="addAsignatura">
    <span class="icon text-white-50">
      <i class="fa fa-plus" aria-hidden="true"></i>
    </span>
    <span class="text">Nova assignatura</span>
  </a>
</div>



<div class="table-responsive" style="width: 100%; margin: 0px auto">
	<table class="table table-bordered table-hover" id="dataTableAsignaturas" width="100%" cellspacing="0">
  		<thead>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th style="width:10%">Opcions</th>
            </tr>
      	</thead>
      	<tbody>
      		<?php foreach ($lista as $asignatura): ?>
	            <tr>
  		          <td><?php echo htmlspecialchars($asignatura['idAsignaturas']);?></td>
  		          <td><?php echo htmlspecialchars($asignatura['nombre']);?></td>
                <td >
                  <div class="dropdown mb-0" style="text-align: center;">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-info-circle"></i>
                      <span class="text">Detalls</span>
                    </button>
                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                      <a id="botonEditarAsignatura-<?php echo $asignatura['idAsignaturas'];?>" class="dropdown-item" href="#">Modificar</a>
                      <div class="dropdown-divider"></div>
                      <a id="botonBorrarAsignatura-<?php echo $asignatura['idAsignaturas'];?>" class="dropdown-item" href="#">Eliminar</a>
                      <script>eliminarAsignatura(<?php echo $asignatura['idAsignaturas'];?>)</script>
                      <script>mostrarModificarAsignatura(<?php echo $asignatura['idAsignaturas'];?>)</script>
                    </div>
                  </div>
                </td>
	            </tr>
		      <?php endforeach; ?>
  		</tbody>
	</table>
</div>

<!-- Funciones personalizadas -->
<script src="js/tablas/tablaAsignaturas.js"></script>
<script>mostrarAddAsignatura()</script>
