<?php foreach ($cargos as $cargo): ?>

  <div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Editar el càrrec</h1>
    </div>

    <div class="card-body">
      <form action="index.php?accion=editCargo" method="post">
        <div class="row">
          <div class="col">
            <h5>ID</h5>
            <input id="idCargos" type="text" class="form-control" placeholder="ID" name="idCargos" value="<?php echo $cargo['idCargos'];?>">
          </div>
          <div class="col">
            <h5>Descripció</h5>
            <input id="descripcion" type="text" class="form-control" placeholder="Descripció" name="descripcion" value="<?php echo $cargo['descripcion'];?>">
          </div>
          <div class="col">
            <h5>ID element</h5>
            <input id="idEnAmbito" type="text" class="form-control" placeholder="idEnAmbito" name="idEnAmbito" value="<?php echo $cargo['idEnAmbito'];?>">
          </div>
          <div class="col">
            <h5>Àmbits</h5>
            <select class="custom-select" name="Ambitos_idAmbitos" id="Ambitos_idAmbitos">

              <?php foreach ($ambitos as $ambito): ?>
                <?php if($ambito['asignable'] == 1) { ?>
                  <?php if($ambito['idAmbitos'] == $cargo['Ambitos_idAmbitos']){ ?>
                    <option value="<?php echo $ambito['idAmbitos']; ?>" selected><?php echo $ambito['nombre']; ?></option>
                  <?php } else {?>
                    <option value="<?php echo $ambito['idAmbitos']; ?>"><?php echo $ambito['nombre']; ?></option>
                  <?php } ?>
                <?php }
                endforeach; ?>
            </select>

            <!--input id="Ambitos_idAmbitos" type="text" class="form-control" placeholder="Ambitos_idAmbitos" name="Ambitos_idAmbitos" value="<?php echo $cargo['Ambitos_idAmbitos'];?>"-->
          </div>
        </div>
        <input type="submit" class="btn btn-primary" style="margin-top: 10px" onclick="editarCargo()" id="editCargo"></input>
      </form>
    </div>
  </div>

<?php endforeach; ?>
