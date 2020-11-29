<link rel="stylesheet" href="css/choices.min.css">
<script src="js/choices.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<!--script src="js/bootstrap.bundle.min.js"></script-->


<div class="card shadow mb-4">
  <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
    <h2 class="h3 mb-0 text-gray-800">Afegir professors al càrrec</h2>
  </div>

  <div class="card-body">
    <h4><?php echo $nombreCargo[0]["descripcion"]?></h4>
    <form action="index.php?accion=asignarProfesorCargo&idCargo=<?php echo $_POST["id"]?>" method="post">
      <select name="profesores[]" id="choices-multiple-remove-button" placeholder="Selecciona als professors" multiple>
        <?php foreach ($lista as $profesor):
          if(in_array($profesor["niu"], $listaProfCargo)){?>
            <option value="<?php echo $profesor["niu"]?>" selected><?php echo $profesor["niu"]." - ".$profesor["nombre"]." ".$profesor["apellido"]; ?></option>
          <?php } else { ?>
            <option value="<?php echo $profesor["niu"]?>"><?php echo $profesor["niu"]." - ".$profesor["nombre"]." ".$profesor["apellido"]; ?></option>
          <?php } ?>
        <?php endforeach; ?>
        </select>
      <input type="submit" class="btn btn-primary"></input>
    </form>
  </div>
</div>

<script>
  $(document).ready(function(){
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
      removeItemButton: true,
      maxItemCount:100,
      searchResultLimit:10,
      renderChoiceLimit:100
    });
  });
</script>
