<div class="card shadow mb-4">
  <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Afegir un nou càrrec</h1>
  </div>

  <div class="card-body">
    <form action="index.php?accion=addCargo" method="post">
      <div class="row">
        <div class="col">
          <h5>Descripció</h5>
          <input id="descripcion" type="text" class="form-control" placeholder="Descripció" name="descripcion">
        </div>
        <div class="col">
          <h5>Àmbit</h5>
          <select class="custom-select" name="Ambitos_idAmbitos" id="Ambitos_idAmbitos" onChange="obtenerElementos(this.value)">
          <option value=''>Selecciona un àmbit</option>
            <?php foreach ($ambitos as $ambito): ?>
              <?php if($ambito['asignable'] == 1) { ?>
                <option value="<?php echo $ambito['idAmbitos']; ?>"><?php echo $ambito['nom']; ?></option>
              <?php } ?>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col">
          <h5>Element</h5>
          <select name="idEnAmbito" id="idEnAmbito" class="custom-select";>
  					<option value=''>Selecciona un element</option>
  				</select>

          <!--input id="idEnAmbito" type="text" class="form-control" placeholder="idEnAmbito" name="idEnAmbito"-->
        </div>
      </div>
      <button type="submit" class="btn btn-primary" style="margin-top: 10px" id="addCargo">Enviar</button>
    </form>
  </div>
</div>
