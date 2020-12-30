<div class="card shadow mb-4">
  <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Afegir un nou departament</h1>
  </div>

  <div class="card-body">
    <form action="index.php?accion=addDepartamento" method="post">
      <div class="row">
        <div class="col">
          <h5>ID</h5>
          <input id="idDepartamentos" type="text" class="form-control" placeholder="ID" name="idDepartamentos">
        </div>
        <div class="col">
          <h5>Nom</h5>
          <input id="nombreDepartamento" type="text" class="form-control" placeholder="Nom" name="nombreDepartamento">
        </div>
        <div class="col">
          <h5>Acrònim</h5>
          <input id="acroDepartamento" type="text" class="form-control" placeholder="Acrònim" name="acroDepartamento">
        </div>
      </div>
      <button type="submit" class="btn btn-primary" style="margin-top: 10px" id="addDepartamento">Enviar</button>
    </form>
  </div>
</div>
