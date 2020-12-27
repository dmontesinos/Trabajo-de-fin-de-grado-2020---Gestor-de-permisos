<?php foreach ($departamentos as $departamento): ?>

  <div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Editar el departament</h1>
    </div>

    <div class="card-body">
      <form action="index.php?accion=editDepartamento" method="post">
        <div class="row">
          <div class="col">
            <h5>ID</h5>
            <input id="idDepartamentos" type="text" class="form-control" placeholder="ID" name="idDepartamentos" value="<?php echo $departamento['idDepartamentos'];?>">
          </div>
          <div class="col">
            <h5>Nom</h5>
            <input id="nombreDepartamento" type="text" class="form-control" placeholder="Nom" name="nombreDepartamento" value="<?php echo $departamento['nombre'];?>">
          </div>
          <div class="col">
            <h5>Acrònim</h5>
            <input id="acroDepartamento" type="text" class="form-control" placeholder="Acrònim" name="acroDepartamento" value="<?php echo $departamento['acronimo'];?>">
          </div>
        </div>
        <input type="submit" class="btn btn-primary" style="margin-top: 10px" onclick="editarDepartamento()" id="editDepartamento"></input>
      </form>
    </div>
  </div>

<?php endforeach; ?>
