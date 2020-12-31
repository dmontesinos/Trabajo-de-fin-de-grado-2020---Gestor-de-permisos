<?php foreach ($estudios as $estudio): ?>

  <div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Editar l'estudi</h1>
    </div>

    <div class="card-body">
      <form action="index.php?accion=editEstudio" method="post">
        <div class="row">
          <div class="col">
            <h5>ID</h5>
            <input id="idEstudio" type="text" class="form-control" placeholder="ID" name="idEstudio" value="<?php echo $estudio['idEstudio'];?>">
          </div>
          <div class="col">
            <h5>Nom</h5>
            <input id="nombreEstudio" type="text" class="form-control" placeholder="Nom" name="nombreEstudio" value="<?php echo $estudio['nombre'];?>">
          </div>
          <div class="col">
            <h5>Acrònim</h5>
            <input id="acroEstudio" type="text" class="form-control" placeholder="Acrònim" name="acroEstudio" value="<?php echo $estudio['acronimo'];?>">
          </div>
          <div class="col">
            <h5>Centre</h5>
            <input id="centro" type="text" class="form-control" placeholder="Centre" name="centro" value="<?php echo $estudio['Centros_idCentros'];?>">
          </div>
          <div class="col">
            <h5>Actiu</h5>
            <select class="custom-select" name="activo" id="activo">
            <?php
              if($estudio['activo']){ ?>
                <option value="1" selected>Si</option>
                <option value="0">No</option>
              <?php } else { ?>
                <option value="1">Si</option>
                <option value="0" selected>No</option>
              <?php } ?>
           </select>
          </div>
          <div class="col">
            <h5>Tipus</h5>
            <select class="custom-select" name="tipo" id="tipo">
            <?php
              if($estudio['tipo'] == "Grau"){?>
                <option value="Grau" selected>Grau</option>
                <option value="Màster">Màster</option
              <?php } else { ?>
                <option value="Grau">Grau</option>
                <option value="Màster" selected>Màster</option
              <?php } ?>
          </div>
        </div>
        <input type="submit" class="btn btn-primary" style="margin-top: 10px" onclick="editarEstudio()" id="editEstudio"></input>
      </form>
    </div>
  </div>

<?php endforeach; ?>
