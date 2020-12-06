<div class="card shadow mb-4">
  <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Afegir un nou objecte</h1>
  </div>

  <div class="card-body">
    <form action="index.php?accion=addObjeto" method="post">
      <div class="row">
        <div class="col">
          <input id="nombreObjeto" type="text" class="form-control" placeholder="Nom" name="nombreObjeto">
        </div>
        <div class="col">
          <input id="descripcionObjeto" type="text" class="form-control" placeholder="Descripció" name="descripcionObjeto">
        </div>
      </div>
      <button type="submit" class="btn btn-primary" style="margin-top: 10px; align=right" id="addObjeto">Enviar</button>
    </form>
  </div>
</div>
