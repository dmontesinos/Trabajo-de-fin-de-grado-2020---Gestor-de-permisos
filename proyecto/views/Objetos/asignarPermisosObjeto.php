<div class="card shadow mb-4">
  <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Seleccionar els permisos: <?php echo $objeto[0]['nombre']; ?></h1>
  </div>

  <div class="card-body">
    <form action="" method="POST" id="submitPermisosObjeto">

    <table class="table table-bordered table-hover" id="dataTablePermisosObjetos" width="100%" cellspacing="0">
  		<thead>
        <tr>
          <th>Nom</th>
          <th style="width: 10%; text-align: center">Cap</th>
          <th style="width: 10%; text-align: center">Bàsic</th>
          <th style="width: 10%; text-align: center">Total</th>
        </tr>
    	</thead>
      	<tbody>
          <?php foreach ($listaAmbitos as $ambito): ?>
            <?php
              $checked = 0;
              $permiso = consultarPermisosObjetoPorAmbito(conexionBD(), $_POST['id'], $ambito['idAmbitos']);
              if(isset($permiso[0])){
                if($permiso[0]['nivel'] == "ninguno"){
                  $checked = 1;
                } elseif($permiso[0]['nivel'] == "basico"){
                  $checked = 2;
                } elseif($permiso[0]['nivel'] == "total"){
                  $checked = 3;
                }
              }
            ?>
            <tr>
              <td><?php echo $ambito['nom'];?></td>
              <td style="text-align:center">
                <input type="radio" id="ninguno" name="<?php echo $ambito['nombre']?>" value="ninguno" <?php if($checked == 1) echo "checked";?>>
              </td>
              <td style="text-align:center">
                <input type="radio" id="basico" name="<?php echo $ambito['nombre']?>" value="basico" <?php if($checked == 2) echo "checked";?>>
              </td>
              <td style="text-align:center">
                <input type="radio" id="total" name="<?php echo $ambito['nombre']?>" value="total" <?php if($checked == 3) echo "checked";?>>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
        <input type="button" name="submit" value="Guardar canvis" class="btn btn-success" onclick="submitPermisosObjeto(<?php echo $_POST['id']; ?>)">
      </form>
  </div>
</div>

<!-- Funciones personalizadas -->
<script src="js\tablas\tablaObjetosPermisos.js"></script>
