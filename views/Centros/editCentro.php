<?php foreach ($centros as $centro): ?>

  <div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Editar el centre</h1>
    </div>

    <div class="card-body">
      <form action="index.php?accion=editCentro" method="post">
        <div class="row">
          <div class="col">
            <h5>ID</h5>
            <input id="idCentro" type="text" class="form-control" placeholder="ID" name="idCentro" value="<?php echo $centro['idCentro'];?>">
          </div>
          <div class="col">
            <h5>Nom</h5>
            <input id="nombreCentro" type="text" class="form-control" placeholder="Nom" name="nombreCentro" value="<?php echo $centro['nombre'];?>">
          </div>
          <div class="col">
            <h5>Acrònim</h5>
            <input id="acroCentro" type="text" class="form-control" placeholder="Acrònim" name="acroCentro" value="<?php echo $centro['acronimo'];?>">
          </div>
        </div>
        <input type="submit" class="btn btn-primary" style="margin-top: 10px" onclick="editarCentro()" id="editCentro"></input>
      </form>
    </div>
  </div>

<?php endforeach; ?>
