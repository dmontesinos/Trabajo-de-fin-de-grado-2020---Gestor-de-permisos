<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Llistat d'assignatures</h1>
  <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->

  <a href="#" class="btn btn-success btn-icon-split" style="float: right">
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
  		          <td><?php echo $asignatura['idAsignaturas'];?></td>
  		          <td><?php echo $asignatura['nombre'];?></td>
                <!--td>
                  <a href="#" class="btn btn-danger btn-circle">
                    <i class="fas fa-trash"></i>
                  </a>
                </td-->
                <td >
                  <div class="dropdown mb-0" style="text-align: center">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-info-circle"></i>
                      <span class="text">Detalls</span>
                    </button>
                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Modificar</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Eliminar</a>
                    </div>
                  </div>
                </td>
	            </tr>
		      <?php endforeach; ?>
  		</tbody>
	</table>
</div>
<script src="js/tablas/tablaAsignaturas.js"></script>