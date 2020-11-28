<!DOCTYPE html>
<html lang="es">

	<?php
		include 'config.php';
	?>

		<head>
			<!-- Required meta tags -->
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

			<!-- Bootstrap CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		</head>
		<body>

			<script>
			   function obtenerEstudios(valor)
			   {
				 $.ajax
				 ({
					type: "POST",
					url: "get_estudio.php",
					data:'id_centro='+valor,
					success: function(data)
					{
					   $("#lista_estudios").html(data);
					}
				 });
				}

				function obtenerAsignaturas(valor)
				{
				$.ajax
				({
				 type: "POST",
				 url: "get_asignatura.php",
				 data:'id_estudio='+valor,
				 success: function(data)
				 {
						$("#lista_asignaturas").html(data);
				 }
				});
			 }
			</script>

			<?php
				$consulta_centros = $link->query("select idCentro as 'valor', nombre as 'descripcion' from Centros order by nombre");
				$consulta_estudios = $link->query("select idEstudio as 'valor', nombre as 'descripcion' from Estudios order by nombre");
				$consulta_asignaturas = $link->query("select idAsignaturas as 'valor', nombre as 'descripcion' from Asignaturas order by nombre");
			?>

			<div class="form-group col-md-3">
				<label>Centros:</label>
				<select name="centro" class="form-control" id="lista_centros" onChange="obtenerEstudios(this.value);">
					<option value=''>Seleccionar Centro</option>
						<?php

							while($row= $consulta_centros->fetch_object())
							{
								echo "<option value='".$row->valor."'>".$row->descripcion."</option>";
							}
						?>
				</select>
			</div>

			<div class="form-group col-md-6">
				<label>Estudios:</label>
				<select name="estudio" id="lista_estudios" class="form-control" onChange="obtenerAsignaturas(this.value);">
					<option value=''>Seleccionar Estudio</option>
						<?php
							while($row= $consulta_estudios->fetch_object())
						   {
							  echo "<option value='".$row->valor."'>".$row->descripcion."</option>";
						   }
						?>
				</select>
			</div>

			<div class="form-group col-md-6">
				<label>Asignaturas:</label>
				<select name="asignatura" id="lista_asignaturas" class="form-control">
					<option value=''>Seleccionar Asignatura</option>
						<?php
							while($row= $consulta_asignaturas->fetch_object())
						   {
							  echo "<option value='".$row->valor."'>".$row->descripcion."</option>";
						   }
						?>
				</select>
			</div>


			<!-- Optional JavaScript -->
			<!-- jQuery first, then Popper.js, then Bootstrap JS -->
			<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

	</body>
</html>
