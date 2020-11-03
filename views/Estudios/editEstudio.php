<?php foreach ($estudios as $estudio): ?>

  <div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Editar l'estudi</h1>
    </div>

    <div class="card-body">
      <form action="index.php?accion=editEstudio" method="post">
        <div class="row">
          <div class="col">
            <h5>ID</h5>
            <input id="idEstudio" type="text" class="form-control" placeholder="ID" name="idEstudio" value="<?php echo $estudio['idEstudio'];?>">
          </div>
          <div class="col">
            <h5>Nom</h5>
            <input id="nombreEstudio" type="text" class="form-control" placeholder="Nom" name="nombreEstudio" value="<?php echo $estudio['nombre'];?>">
          </div>
          <div class="col">
            <h5>Acrònim</h5>
            <input id="acroEstudio" type="text" class="form-control" placeholder="Acrònim" name="acroEstudio" value="<?php echo $estudio['acronimo'];?>">
          </div>
          <div class="col">
            <h5>Centre</h5>
            <input id="centro" type="text" class="form-control" placeholder="Centre" name="centro" value="<?php echo $estudio['Centros_idCentros'];?>">
          </div>
          <div class="col">
            <h5>Actiu</h5>
            <?php
              if($estudio['activo']){
                echo '<input type="radio" id="activo" name="activo" value="1" checked>';
                echo '<label for="activo">Si</label><br>';
                echo '<input type="radio" id="activo" name="activo" value="0">';
                echo '<label for="activo">No</label><br>';
              } else {
                echo '<input type="radio" id="activo" name="activo" value="1">';
                echo '<label for="activo">Si</label><br>';
                echo '<input type="radio" id="activo" name="activo" value="0" checked>';
                echo '<label for="activo">No</label><br>';
              }
             ?>
            <!--input id="actiu" type="text" class="form-control" placeholder="Actiu" name="actiu" value="<?php echo $estudio['actiu'];?>"-->
          </div>
          <div class="col">
            <h5>Tipus</h5>
            <?php
              if($estudio['tipo'] == "Grau"){
                echo '<input type="radio" id="tipo" name="tipo" value="Grau" checked>';
                echo '<label for="tipo">Grau</label><br>';
                echo '<input type="radio" id="tipo" name="tipo" value="Màster">';
                echo '<label for="tipo">Màster</label><br>';
              } else {
                echo '<input type="radio" id="tipo" name="tipo" value="Grau">';
                echo '<label for="tipo">Grau</label><br>';
                echo '<input type="radio" id="tipo" name="tipo" value="Màster" checked>';
                echo '<label for="tipo">Màster</label><br>';
              }
             ?>
          </div>
        </div>
        <input type="submit" class="btn btn-primary" style="margin-top: 10px; align=right" onclick="editarEstudio()" id="editEstudio"></input>
      </form>
    </div>
  </div>

<?php endforeach; ?>
