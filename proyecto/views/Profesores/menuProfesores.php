<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Llistat de professors</h1>


  <a href="#" class="btn btn-success btn-icon-split" style="float: right" id="addProfesor">
    <span class="icon text-white-50">
      <i class="fa fa-plus" aria-hidden="true"></i>
    </span>
    <span class="text">Nou professor</span>
  </a>
</div>



<div class="table-responsive" style="width: 100%; margin: 0px auto">
	<table class="table table-bordered table-hover" id="dataTableProfesores" width="100%" cellspacing="0">
  		<thead>
            <tr>
              <th>NIU</th>
              <th>Nom</th>
              <th>Cognoms</th>
              <th style="width:10%">Opcions</th>
            </tr>
      	</thead>
      	<tbody>
      		<?php foreach ($lista as $profesor): ?>
	            <tr>
  		          <td><?php echo htmlspecialchars($profesor['niu']);?></td>
  		          <td><?php echo htmlspecialchars($profesor['nombre']);?></td>
                <td><?php echo htmlspecialchars($profesor['apellido']);?></td>
                <td >
                  <div class="dropdown mb-0" style="text-align: center;">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-info-circle"></i>
                      <span class="text">Detalls</span>
                    </button>
                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                      <a id="botonEditarProfesor-<?php echo $profesor['niu'];?>" class="dropdown-item" href="#">Modificar</a>
                      <div class="dropdown-divider"></div>
                      <a id="botonBorrarProfesor-<?php echo $profesor['niu'];?>" class="dropdown-item" href="#">Eliminar</a>
                      <script>eliminarProfesor(<?php echo $profesor['niu'];?>)</script>
                      <script>mostrarModificarProfesor(<?php echo $profesor['niu'];?>)</script>
                    </div>
                  </div>
                </td>
	            </tr>
		      <?php endforeach; ?>
  		</tbody>
	</table>
</div>

<!-- Funciones personalizadas -->
<script src="js/tablas/tablaProfesores.js"></script>
<script>mostrarAddProfesor()</script>
