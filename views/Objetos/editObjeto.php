<?php foreach ($objetos as $objeto): ?>

  <div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Editar l'estudi</h1>
    </div>

    <div class="card-body">
      <form action="index.php?accion=editObjeto" method="post">
        <div class="row">
          <div class="col">
            <h5>ID</h5>
            <input id="idObjeto" type="text" class="form-control" placeholder="ID" name="idObjeto" value="<?php echo $objeto['idObjeto'];?>">
          </div>
          <div class="col">
            <h5>Nom</h5>
            <input id="nombreObjeto" type="text" class="form-control" placeholder="Nom" name="nombreObjeto" value="<?php echo $objeto['nombre'];?>">
          </div>
          <div class="col">
            <h5>Descripció</h5>
            <input id="descripcionObjeto" type="text" class="form-control" placeholder="Descripció" name="descripcionObjeto" value="<?php echo $objeto['descripcion'];?>">
          </div>
        </div>
        <input type="submit" class="btn btn-primary" style="margin-top: 10px" onclick="editObjeto()" id="editObjeto"></input>
      </form>
    </div>
  </div>

<?php endforeach; ?>