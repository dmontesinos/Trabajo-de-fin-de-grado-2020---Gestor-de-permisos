<div class="card shadow mb-4">
  <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Afegir un nou grup a l'assignatura</h1>
  </div>

  <div class="card-body">
    <form action="index.php?accion=addGrupo" method="post">
      <div class="row">
        <div class="col">
        <h5>Assignatura</h5>
          <select name="asignatura" class="custom-select">
  					<option value=''>Seleccionar assignatura</option>
              <?php
              foreach($asignaturas as $asignatura){
                echo "<option value='".$asignatura['idAsignaturas']."'>".$asignatura['nombre']."</option>";
              }
  						?>
  				</select>
        </div>
        <div class="col">
          <h5>Grup</h5>
          <input id="grupo" type="text" class="form-control" placeholder="Grup" name="grupo">
        </div>
        <div class="col">
          <h5>Ocupació</h5>
          <input id="ocupacion" type="text" class="form-control" placeholder="Ocupació" name="ocupacion">
        </div>
        <div class="col">
          <h5>Curs</h5>
          <select name="curso" class="custom-select">
  					<option value=''>Seleccionar curs</option>
              <?php
              foreach($cursos as $curso){
                echo "<option value='".$curso['inicio']."'>".$curso['inicio']."</option>";
              }
  						?>
  				</select>
        </div>
      </div>
      <button type="submit" class="btn btn-primary" style="margin-top: 10px" id="addGrupo">Enviar</button>
    </form>
  </div>
</div>
