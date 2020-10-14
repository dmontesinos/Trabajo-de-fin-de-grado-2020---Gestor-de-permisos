<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Llistat d'estudis</h1>
  <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->

  <a href="#" class="btn btn-success btn-icon-split" style="float: right">
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

            </tr>
      	</thead>
      	<tbody>
      		<?php foreach ($lista as $estudio): ?>
	            <tr>
  		          <td><?php echo $estudio['idEstudio'];?></td>
  		          <td><?php echo $estudio['nombre'];?></td>
  		          <td><?php echo $estudio['acronimo'];?></td>
                <td><?php echo $estudio['Centros_idCentros'];?></td>
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
                
	            </tr>
			<?php endforeach; ?>
  		</tbody>
	</table>
</div>
<script src="js/tablas/tablaEstudios.js"></script>