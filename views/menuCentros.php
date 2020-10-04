<div class="table-responsive">
	<table class="table table-bordered" id="dataTableCentros" width="100%" cellspacing="0">
  		<thead>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Acrònim</th>
            </tr>
      	</thead>
      	<tbody>
      		<?php foreach ($lista as $centro): ?>
	            <tr>
		          <td><?php echo $centro['idCentro'];?></td>
		          <td><?php echo $centro['nombre'];?></td>
		          <td><?php echo $centro['acronimo'];?></td>
	            </tr>
			<?php endforeach; ?>
  		</tbody>
	</table>
</div>
<script src="js/tablas/tablaCentros.js"></script>