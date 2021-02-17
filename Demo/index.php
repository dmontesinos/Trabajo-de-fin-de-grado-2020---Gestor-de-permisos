<?php
if(isset($_GET['niu']) && !empty($_GET['niu'])){
  $profesor = $_GET['niu'];

$url = "localhost:8000/api/professors/".$profesor;

/*$data_array = array(
    'name' => 'John Doe',
    'job' => 'Web Developer'
);*/

//$data = http_build_query($data_array);

$header = array(
    'Authorization: Bearer 9|Zy8TdmLEVyCliv9phC31EUkFmy7ChTJX2Pp1fLLk'
);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

$resp = curl_exec($ch);

if($e = curl_error($ch)) {
    echo $e;
} else {
    $decodedName = json_decode($resp, true);
}

$url = "localhost:8000/api/professors/carrecs/".$profesor;

/*$data_array = array(
    'name' => 'John',
    'job' => 'Web'
);*/

//$data = http_build_query($data_array);

/*$header = array(
  'Authorization: Bearer 9|Zy8TdmLEVyCliv9phC31EUkFmy7ChTJX2Pp1fLLk'
);*/

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

$resp = curl_exec($ch);

if($e = curl_error($ch)) {
  echo $e;
} else {
  $decodedInfo = json_decode($resp, true);
}

$url = "localhost:8000/api/professors/assignatures/".$profesor;

/*$data_array = array(
    'name' => 'John Doe',
    'job' => 'Web Developer'
);*/

//$data = http_build_query($data_array);

/*$header = array(
  'Authorization: Bearer 9|Zy8TdmLEVyCliv9phC31EUkFmy7ChTJX2Pp1fLLk'
);*/

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

$resp = curl_exec($ch);

if($e = curl_error($ch)) {
  echo $e;
} else {
  $decodedAsignaturas = json_decode($resp, true);
}

curl_close($ch);
?>
<html>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link href="css/secondary.css" rel="stylesheet">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


	<div class="container">
		<div class="row profile">
			<div class="col-md-3">
				<div class="profile-sidebar">
					<div class="profile-userpic">
						<img src="img/avatar.png" class="img-responsive" alt="">
					</div>
					<div class="profile-usertitle">
						<div class="profile-usertitle-name">
							<?php echo $decodedName[0]["Cognoms"].", ".$decodedName[0]["Nom"];?>
						</div>
						<div class="profile-usertitle-job">
							<?php
							foreach($decodedInfo as $elemento => $cargo){
							echo $cargo['NomCarrec']." ";
							}

							?>
						</div>
					</div>
					<div class="profile-userbuttons">
						<button type="button" class="btn btn-success btn-sm">Seguir</button>
						<button type="button" class="btn btn-danger btn-sm">Mensaje</button>
					</div>
					<div class="profile-usermenu">
						<ul class="nav">
							<li class="active">
								<a href="#">
								<i class="glyphicon glyphicon-home"></i>
								Más información </a>
							</li>
							<li>
								<a href="#">
								<i class="glyphicon glyphicon-user"></i>
								Ajustes de cuenta </a>
							</li>
							<li>
								<a href="#">
								<i class="glyphicon glyphicon-ok"></i>
								Tareas </a>
							</li>
							<li>
								<a href="#">
								<i class="glyphicon glyphicon-flag"></i>
								Ayuda </a>
							</li>
							<li>
								<a href="index2.php?niu=<?php echo $_GET['niu']?>">
									<i class="glyphicon glyphicon-tasks"></i>
									Objetos
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9">
			<div class="profile-content">
				<?php
				if(empty($decodedAsignaturas)){
					echo "<h4>No hay asignaturas registradas</h4>";
				} else {
					echo "<h2> Asignaturas </h2>";
					echo "<hr class='solid'>";

					foreach($decodedAsignaturas as $elemento => $asignatura){
						echo "Curso: ".$asignatura['Curs']."<br>";
						echo "Asignatura: ".$asignatura['Assignatura']."<br>";
						echo "Grupo: ".$asignatura['Grup']."<br>";
						echo "Ocupación: ".$asignatura['Ocupació']."<br>";
						echo "<hr class='solid'>";
					}
				}
				?>
			</div>
		</div>
		</div>
	</div>
	<br>
	<br>
</html>
<?php
} else {
?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Búsqueda de profesores por NIU</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<form class="login100-form validate-form">
						<span class="login100-form-title p-b-34">
							Búsqueda de profesor
						</span>
						
						<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
							<input id="first-name" class="input100" type="text" name="niu" placeholder="NIU">
							<span class="focus-input100"></span>
						</div>
						
						<div class="container-login100-form-btn">
							<button class="login100-form-btn">
								Buscar
							</button>
						</div>
					</form>

					<div class="login100-more" style="background-image: url('images/uab.jpg');"></div>
				</div>
			</div>
		</div>
		
		

		<div id="dropDownSelect1"></div>
		
		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
		<script src="vendor/animsition/js/animsition.min.js"></script>
		<script src="vendor/bootstrap/js/popper.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script>
			$(".selection-2").select2({
				minimumResultsForSearch: 20,
				dropdownParent: $('#dropDownSelect1')
			});
		</script>
		<script src="vendor/daterangepicker/moment.min.js"></script>
		<script src="vendor/daterangepicker/daterangepicker.js"></script>
		<script src="vendor/countdowntime/countdowntime.js"></script>
		<script src="js/main.js"></script>

	</body>
	</html>


<?php
}
?>