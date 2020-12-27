<?php foreach ($asignaturas as $asignatura): ?>

  <div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Editar l'assignatura</h1>
    </div>

    <div class="card-body">
      <form action="index.php?accion=editAsignatura" method="post">
        <div class="row">
          <div class="col">
            <h5>ID</h5>
            <input id="idAsignatura" type="text" class="form-control" placeholder="ID" name="idAsignatura" value="<?php echo $asignatura['idAsignaturas'];?>">
          </div>
          <div class="col">
            <h5>Nom</h5>
            <input id="nombre" type="text" class="form-control" placeholder="Nom" name="nombre" value="<?php echo $asignatura['nombre'];?>">
          </div>
        </div>
        <input type="submit" class="btn btn-primary" style="margin-top: 10px" onclick="editarAsignatura()" id="editAsignatura"></input>
      </form>
    </div>
  </div>

<?php endforeach; ?>
