<div class="card shadow mb-4">
  <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Afegir un nou centre</h1>
  </div>

  <div class="card-body">
    <form action="index.php?accion=addCentro" method="post">
      <div class="row">
        <div class="col">
          <h5>ID</h5>
          <input id="idCentro" type="text" class="form-control" placeholder="ID" name="idCentro">
        </div>
        <div class="col">
          <h5>Nom</h5>
          <input id="nombreCentro" type="text" class="form-control" placeholder="Nom" name="nombreCentro">
        </div>
        <div class="col">
          <h5>Acrònim</h5>
          <input id="acroCentro" type="text" class="form-control" placeholder="Acrònim" name="acroCentro">
        </div>
      </div>
      <button type="submit" class="btn btn-primary" style="margin-top: 10px" id="addCentro">Enviar</button>
    </form>
  </div>
</div>
