<div class="card shadow mb-4">
  <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Importació automàtica de dades a la DB mitjançant fitxers Excel</h1>
  </div>

  <div class="card-body">
      <div class="row">
        <div class="col">
            <form action="index.php?accion=importacion" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                <div>
                    <label>Selecciona el fitxer Excel</label> 
                    <input type="file" name="file" id="file" accept=".xls,.xlsx">
                    </br>
                    <button type="submit" id="submit" name="import" class="btn btn-primary">Importar</button>
                </div>
            </form>
        </div>
      </div>
  </div>
</div>