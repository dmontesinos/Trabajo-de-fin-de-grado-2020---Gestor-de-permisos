<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Llistat de departaments</h1>



  <a href="#" class="btn btn-success btn-icon-split" style="float: right" id="addDepartamento">
    <span class="icon text-white-50">
      <i class="fa fa-plus" aria-hidden="true"></i>
    </span>
    <span class="text">Nou departament</span>
  </a>
</div>



<div class="table-responsive" style="width: 100%; margin: 0px auto">
	<table class="table table-bordered table-hover" id="dataTableDepartamentos" width="100%" cellspacing="0">
  		<thead>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Acrònim</th>
              <th style="width:10%">Opcions</th>
            </tr>
      	</thead>
      	<tbody>
      		<?php foreach ($lista as $departamento): ?>
	            <tr>
  		          <td><?php echo htmlspecialchars($departamento['idDepartamentos']);?></td>
  		          <td><?php echo htmlspecialchars($departamento['nombre']);?></td>
                <td><?php echo htmlspecialchars($departamento['acronimo']);?></td>
                <td >
                  <div class="dropdown mb-0" style="text-align: center;">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-info-circle"></i>
                      <span class="text">Detalls</span>
                    </button>
                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">

                      <a id="botonAsignarProfesorDepartamento-<?php echo $departamento['idDepartamentos'];?>" class="dropdown-item" href="#">Assignar professors</a>
                      <div class="dropdown-divider"></div>

                      <a id="botonEditarDepartamento-<?php echo $departamento['idDepartamentos'];?>" class="dropdown-item" href="#">Modificar</a>
                      <div class="dropdown-divider"></div>
                      <a id="botonBorrarDepartamento-<?php echo $departamento['idDepartamentos'];?>" class="dropdown-item" href="#">Eliminar</a>
                      <script>eliminarDepartamento(<?php echo $departamento['idDepartamentos'];?>)</script>
                      <script>mostrarModificarDepartamento(<?php echo $departamento['idDepartamentos'];?>)</script>
                      <script>mostrarAsignarDepartamento(<?php echo $departamento['idDepartamentos'];?>)</script>
                    </div>
                  </div>
                </td>
	            </tr>
		      <?php endforeach; ?>
  		</tbody>
	</table>
</div>

<!-- Funciones personalizadas -->
<script src="js/tablas/tablaDepartamentos.js"></script>
<script>mostrarAddDepartamento()</script>
