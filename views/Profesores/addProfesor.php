<div class="card shadow mb-4">
  <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Afegir un nou professor</h1>
  </div>

  <div class="card-body">
    <form action="index.php?accion=addProfesor" method="post">
      <div class="row">
        <div class="col">
          <input id="niu" type="text" class="form-control" placeholder="NIU" name="niu">
        </div>
        <div class="col">
          <input id="nombreProfesor" type="text" class="form-control" placeholder="Nom" name="nombreProfesor">
        </div>
        <div class="col">
          <input id="apellido1Profesor" type="text" class="form-control" placeholder="Primer Cognom" name="apellido1Profesor">
        </div>
        <div class="col">
          <input id="apellido2Profesor" type="text" class="form-control" placeholder="Segon Cognom" name="apellido2Profesor">
        </div>
      </div>
      <button type="submit" class="btn btn-primary" style="margin-top: 10px; align=right" id="addProfesor">Enviar</button>
    </form>
  </div>
</div>
