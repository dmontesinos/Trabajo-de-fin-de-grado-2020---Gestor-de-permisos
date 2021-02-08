<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Llistat d'objectes</h1>

  <a href="#" class="btn btn-success btn-icon-split" style="float: right" id="addObjeto">
    <span class="icon text-white-50">
      <i class="fa fa-plus" aria-hidden="true"></i>
    </span>
    <span class="text">Nou objecte</span>
  </a>
</div>


<div class="table-responsive">
	<table class="table table-bordered table-hover" id="dataTableObjetos" width="100%" cellspacing="0">
  		<thead>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Descripció</th>
              <th style="width:10%">Opcions</th>
            </tr>
      	</thead>
      	<tbody>
      		<?php foreach ($lista as $objeto): ?>
	            <tr>
  		          <td><?php echo htmlspecialchars($objeto['idObjeto']);?></td>
  		          <td><?php echo htmlspecialchars($objeto['nombre']);?></td>
  		          <td><?php echo htmlspecialchars($objeto['descripcion']);?></td>

                <td>
                  <div class="dropdown mb-0" style="text-align: center;">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-info-circle"></i>
                      <span class="text">Detalls</span>
                    </button>
                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                      <a id="botonAsignarPermisosObjeto-<?php echo $objeto['idObjeto'];?>" class="dropdown-item" href="#">Assignar permisos</a>
                      <div class="dropdown-divider"></div>
                      <a id="botonEditarObjeto-<?php echo $objeto['idObjeto'];?>" class="dropdown-item" href="#">Modificar</a>
                      <div class="dropdown-divider"></div>
                      <a id="botonBorrarObjeto-<?php echo $objeto['idObjeto'];?>" class="dropdown-item" href="#">Eliminar</a>
                      <script>eliminarObjeto(<?php echo $objeto['idObjeto'];?>)</script>
                      <script>mostrarModificarObjeto(<?php echo $objeto['idObjeto'];?>)</script>
                      <script>mostrarAsignarPermisosObjeto(<?php echo $objeto['idObjeto'];?>)</script>
                    </div>
                  </div>
                </td>
	            </tr>
			<?php endforeach; ?>
  		</tbody>
	</table>
</div>

<!-- Funciones personalizadas -->
<script src="js/tablas/tablaObjetos.js"></script>
<script>mostrarAddObjeto()</script>
