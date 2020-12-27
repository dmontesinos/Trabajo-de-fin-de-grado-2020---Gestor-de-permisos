<div class="card shadow mb-4">
  <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Afegir un nou estudi</h1>
  </div>

  <div class="card-body">
    <form action="index.php?accion=addEstudio" method="post">
      <div class="row">
        <div class="col">
          <input id="idEstudio" type="text" class="form-control" placeholder="ID" name="idEstudio">
        </div>
        <div class="col">
          <input id="nombreEstudio" type="text" class="form-control" placeholder="Nom" name="nombreEstudio">
        </div>
        <div class="col">
          <input id="acroEstudio" type="text" class="form-control" placeholder="Acrònim" name="acroEstudio">
        </div>
        <div class="col">
          <input id="idCentro" type="text" class="form-control" placeholder="Centre" name="idCentro">
        </div>
        <div class="col">
          <select class="custom-select" name="activo" id="activo">
            <option value="1" selected>Si</option>
            <option value="0">No</option>
          </select>
          <!--input id="activo" type="text" class="form-control" placeholder="Actiu" name="activo"-->
        </div>
        <div class="col">
          <select class="custom-select" name="tipo" id="tipo">
            <option value="Grau" selected>Grau</option>
            <option value="Màster">Màster</option>
          </select>
          <!--input id="tipo" type="text" class="form-control" placeholder="Tipus" name="tipo"-->
        </div>
      </div>
      <button type="submit" class="btn btn-primary" style="margin-top: 10px" id="addEstudio">Enviar</button>
    </form>
  </div>
</div>
