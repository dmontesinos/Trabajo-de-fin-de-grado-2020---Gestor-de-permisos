<div class="card shadow mb-4">
  <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Afegir un nou professor</h1>
  </div>

  <div class="card-body">
    <form action="index.php?accion=addProfesor" method="post">
      <div class="row">
        <div class="col">
          <h5>NIU</h5>
          <input id="niu" type="text" class="form-control" placeholder="NIU" name="niu">
        </div>
        <div class="col">
          <h5>Nom</h5>
          <input id="nombreProfesor" type="text" class="form-control" placeholder="Nom" name="nombreProfesor">
        </div>
        <div class="col">
          <h5>Cognoms</h5>
          <input id="apellidosProfesor" type="text" class="form-control" placeholder="Cognoms" name="apellidosProfesor">
        </div>
      </div>
      <button type="submit" class="btn btn-primary" style="margin-top: 10px" id="addProfesor">Enviar</button>
    </form>
  </div>
</div>
