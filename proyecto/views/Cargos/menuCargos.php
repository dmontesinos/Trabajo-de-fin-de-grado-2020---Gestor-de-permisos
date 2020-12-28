<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Llistat de càrrecs</h1>
  <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->

  <a href="#" class="btn btn-success btn-icon-split" style="float: right" id="addCargo">
    <span class="icon text-white-50">
      <i class="fa fa-plus" aria-hidden="true"></i>
    </span>
    <span class="text">Nou càrrec</span>
  </a>
</div>

<div class="table-responsive" style="width: 100%; margin: 0px auto">
	<table class="table table-bordered table-hover table-compact" id="dataTableCargos" width="100%" cellspacing="0">
  		<thead>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Àmbit</th><!--Ambitos_idAmbitos-->
              <th>Element</th><!-- idEnAmbito -->
              <th style="width:10%">Opcions</th>

            </tr>
      	</thead>
      	<tbody>
      		<?php foreach ($lista as $cargo): ?>
	            <tr>
  		          <td><?php echo $cargo['idCargos'];?></td>
  		          <td><?php echo $cargo['descripcion'];?></td>

                <td>
                  <?php
                  $nombreAmbito = consultarAmbito(conexionBD(), $cargo['Ambitos_idAmbitos']);
                  echo $nombreAmbito[0]['nombre'];
                  //echo $cargo['Ambitos_idAmbitos'];
                  ?>

                  <!--Crear una query para sacar el objeto concreto del ambito mostrado anteriormente. Para ello poner como variable
                  el "ambito" en el FROM de la query. Despues, en el where, establecer el "idEnAmbito". De esta forma mostraremos
                  el objeto concreto del ambito concreto.-->

                  <!--
                  Para mostrar profesores y grupos necesitamos la variable "nombre" dentro del ámbito concreto y estas dos tablas no lo tienen.
                  Se debe buscar alternativa a eso.
                  -->

                </td>

                <td>

                  <!--
                  ¿Utilizar DESCRIBE en SQL para identificar el nombre de la id de la tabla?
                  -->
                  <?php
                  //echo $cargo['idEnAmbito'];
                  if($nombreAmbito[0]['nombre'] == "Profesores"){
                    $elemento = consultarIdEnAmbito(conexionBD(), $cargo['idEnAmbito'], $cargo['Ambitos_idAmbitos']);
                    echo ($elemento[0]['apellido'].", ".$elemento[0]['nombre']);
                  } elseif ($nombreAmbito[0]['nombre'] == "Grupo") {
                    $elemento = consultarIdEnAmbito(conexionBD(), $cargo['idEnAmbito'], $cargo['Ambitos_idAmbitos']);
                    echo $elemento[0]['idGrupo'];
                  } else {
                    $elemento = consultarIdEnAmbito(conexionBD(), $cargo['idEnAmbito'], $cargo['Ambitos_idAmbitos']);
                    echo $elemento[0]['nombre'];
                  }

                  ?>
                </td>

                <td>
                  <div class="dropdown mb-0" style="text-align: center;">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-info-circle"></i>
                      <span class="text">Detalls</span>
                    </button>
                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                      <a id="botonAsignarProfesorCargo-<?php echo $cargo['idCargos'];?>" class="dropdown-item" href="#">Assignar professors</a>
                      <div class="dropdown-divider"></div>
                      <a id="botonEditarCargo-<?php echo $cargo['idCargos'];?>" class="dropdown-item" href="#">Modificar</a>
                      <div class="dropdown-divider"></div>
                      <a id="botonBorrarCargo-<?php echo $cargo['idCargos'];?>" class="dropdown-item" href="#">Eliminar</a>
                      <script>eliminarCargo(<?php echo $cargo['idCargos'];?>)</script>
                      <script>mostrarModificarCargo(<?php echo $cargo['idCargos'];?>)</script>
                      <script>mostrarAsignarCargo(<?php echo $cargo['idCargos'];?>)</script>
                    </div>
                  </div>
                </td>
	            </tr>
			<?php endforeach; ?>
  		</tbody>
	</table>
</div>

<!-- Funciones personalizadas -->
<script src="js/tablas/tablaCargos.js"></script>
<script>mostrarAddCargo()</script>
