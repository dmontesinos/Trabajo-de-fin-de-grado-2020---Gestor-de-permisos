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
            <h5>Primer Cognom</h5>
            <input id="apellido1Profesor" type="text" class="form-control" placeholder="Primer Cognom" name="apellido1Profesor" value="<?php echo $profesor['apellido1'];?>">
          </div>
          <div class="col">
            <h5>Segon Cognom</h5>
            <input id="apellido2Profesor" type="text" class="form-control" placeholder="Segon Cognom" name="apellido2Profesor" value="<?php echo $profesor['apellido2'];?>">
          </div>
        </div>
        <input type="submit" class="btn btn-primary" style="margin-top: 10px; align=right" onclick="editarProfesor()" id="editProfesor"></input>
      </form>
    </div>
  </div>

<?php endforeach; ?>
