<div class="card shadow mb-4">
  <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Afegir una nova asignatura</h1>
  </div>

  <div class="card-body">
    <form action="index.php?accion=addAsignatura" method="post">
      <div class="row">
        <div class="col">
          <h5>ID</h5>
          <input id="idAsignatura" type="text" class="form-control" placeholder="ID" name="idAsignatura">
        </div>
        <div class="col">
          <h5>Nom</h5>
          <input id="nombreAsignatura" type="text" class="form-control" placeholder="Nom" name="nombreAsignatura">
        </div>
      </div>
      <button type="submit" class="btn btn-primary" style="margin-top: 10px" id="addAsignatura">Enviar</button>
    </form>
  </div>
</div>
