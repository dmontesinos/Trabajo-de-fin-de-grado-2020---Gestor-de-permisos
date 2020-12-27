<?php foreach ($profesores as $profesor): ?>

  <div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Editar professor</h1>
    </div>

    <div class="card-body">
      <form action="index.php?accion=editProfesor" method="post">
        <div class="row">
          <div class="col">
            <h5>ID</h5>
            <input id="niu" type="text" class="form-control" placeholder="ID" name="niu" value="<?php echo $profesor['niu'];?>">
          </div>
          <div class="col">
            <h5>Nom</h5>
            <input id="nombreProfesor" type="text" class="form-control" placeholder="Nom" name="nombreProfesor" value="<?php echo $profesor['nombre'];?>">
          </div>
          <div class="col">
            <h5>Cognoms</h5>
            <input id="apellidosProfesor" type="text" class="form-control" placeholder="Cognoms" name="apellidosProfesor" value="<?php echo $profesor['apellido'];?>">
          </div>
        </div>
        <input type="submit" class="btn btn-primary" style="margin-top: 10px" onclick="editarProfesor()" id="editProfesor"></input>
      </form>
    </div>
  </div>

<?php endforeach; ?>
