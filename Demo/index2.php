<?php
if(isset($_GET['niu']) && !empty($_GET['niu'])){
    $profesor = $_GET['niu'];

    $url = "localhost:8000/api/professors/permisos/$profesor/36";
    $url2 = "localhost:8000/api/professors/permisos/$profesor/37";
    $url3 = "localhost:8000/api/professors/permisos/$profesor/38";


    $header = array(
        'Authorization: Bearer 9|Zy8TdmLEVyCliv9phC31EUkFmy7ChTJX2Pp1fLLk'
    );

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

    $resp = curl_exec($ch);

    if($e = curl_error($ch)) {
        echo $e;
    } else {
        $decodedEncuesta1 = json_decode($resp, true);
    }

    curl_setopt($ch, CURLOPT_URL, $url2);
    $resp = curl_exec($ch);

    if($e = curl_error($ch)) {
        echo $e;
    } else {
        $decodedEncuesta2 = json_decode($resp, true);
    }

    curl_setopt($ch, CURLOPT_URL, $url3);
    $resp = curl_exec($ch);

    if($e = curl_error($ch)) {
        echo $e;
    } else {
        $decodedEncuesta3 = json_decode($resp, true);
    }

}
?>
<html>
<style>
/*    --------------------------------------------------
	:: General
	-------------------------------------------------- */
    body {
        font-family: 'Open Sans', sans-serif;
        color: #353535;
    }
    .content h1 {
        text-align: center;
    }
    .content .content-footer p {
        color: #6d6d6d;
        font-size: 12px;
        text-align: center;
    }
    .content .content-footer p a {
        color: inherit;
        font-weight: bold;
    }
    
    /*	--------------------------------------------------
        :: Table Filter
        -------------------------------------------------- */
    .panel {
        border: 1px solid #ddd;
        background-color: #fcfcfc;
    }
    .panel .btn-group {
        margin: 15px 0 30px;
    }
    .panel .btn-group .btn {
        transition: background-color .3s ease;
    }
    .table-filter {
        background-color: #fff;
        border-bottom: 1px solid #eee;
    }
    .table-filter tbody tr:hover {
        cursor: pointer;
        background-color: #eee;
    }
    .table-filter tbody tr td {
        padding: 10px;
        vertical-align: middle;
        border-top-color: #eee;
    }
    .table-filter tbody tr.selected td {
        background-color: #eee;
    }
    .table-filter tr td:first-child {
        width: 38px;
    }
    .table-filter tr td:nth-child(2) {
        width: 35px;
    }
    .ckbox {
        position: relative;
    }
    .ckbox input[type="checkbox"] {
        opacity: 0;
    }
    .ckbox label {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .ckbox label:before {
        content: '';
        top: 1px;
        left: 0;
        width: 18px;
        height: 18px;
        display: block;
        position: absolute;
        border-radius: 2px;
        border: 1px solid #bbb;
        background-color: #fff;
    }
    .ckbox input[type="checkbox"]:checked + label:before {
        border-color: #2BBCDE;
        background-color: #2BBCDE;
    }
    .ckbox input[type="checkbox"]:checked + label:after {
        top: 3px;
        left: 3.5px;
        content: '\e013';
        color: #fff;
        font-size: 11px;
        font-family: 'Glyphicons Halflings';
        position: absolute;
    }
    .table-filter .star {
        color: #ccc;
        text-align: center;
        display: block;
    }
    .table-filter .star.star-checked {
        color: #F0AD4E;
    }
    .table-filter .star:hover {
        color: #ccc;
    }
    .table-filter .star.star-checked:hover {
        color: #F0AD4E;
    }
    .table-filter .media-photo {
        width: 35px;
    }
    .table-filter .media-body {
        display: block;
        /* Had to use this style to force the div to expand (wasn't necessary with my bootstrap version 3.3.6) */
    }
    .table-filter .media-meta {
        font-size: 11px;
        color: #999;
    }
    .table-filter .media .title {
        color: #2BBCDE;
        font-size: 14px;
        font-weight: bold;
        line-height: normal;
        margin: 0;
    }
    .table-filter .media .title span {
        font-size: .8em;
        margin-right: 20px;
    }
    .table-filter .media .title span.pagado {
        color: #5cb85c;
    }
    .table-filter .media .title span.pendiente {
        color: #f0ad4e;
    }
    .table-filter .media .title span.cancelado {
        color: #d9534f;
    }
    .table-filter .media .summary {
        font-size: 14px;
    }
</style>

<script>
$(document).ready(function () {

$('.star').on('click', function () {
  $(this).toggleClass('star-checked');
});

$('.ckbox label').on('click', function () {
  $(this).parents('tr').toggleClass('selected');
});

$('.btn-filter').on('click', function () {
  var $target = $(this).data('target');
  if ($target != 'all') {
    $('.table tr').css('display', 'none');
    $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
  } else {
    $('.table tr').css('display', 'none').fadeIn('slow');
  }
});

});
</script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
	<div class="row">

		<section class="content">
			<h1>Lista de encuestas</h1>
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-success btn-filter" data-target="Abierta">Abierta</button>
								<button type="button" class="btn btn-warning btn-filter" data-target="Pendiente">Pendiente</button>
								<button type="button" class="btn btn-danger btn-filter" data-target="Cancelado">Cerrada</button>
								<button type="button" class="btn btn-default btn-filter" data-target="Todos">Todos</button>
							</div>
						</div>
						<div class="table-container">
							<table class="table table-filter">
								<tbody>
									<tr data-status="Abierta">
										<td>
											<div class="ckbox">
												<input type="checkbox" id="checkbox1">
												<label for="checkbox1"></label>
											</div>
										</td>
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="images/encuesta.png" class="media-photo">
												</a>
												<div class="media-body">
													<span class="media-meta pull-right">Febrero 13, 2016</span>
													<h4 class="title">
                                                    Enquestes Assignatura Grau	
														<span class="pull-right pagado">(Abierta)</span>
													</h4>
													<p class="summary">Enquestes de final de semestre passades als estudiants de les assignatures de grau.<p>
                                                    <p>
                                                        <?php
                                                        echo "Permisos: <br>";
                                                        foreach($decodedEncuesta1 as $elemento => $permiso){
                                                            echo ($permiso['Permiso']." <i class='glyphicon glyphicon-arrow-right'></i> ".$permiso['Nivel']."<br>");
                                                            //print_r($permiso);
                                                        }

                                                        ?>
                                                    </p>
												</div>
											</div>
										</td>
									</tr>
									<tr data-status="pendiente">
										<td>
											<div class="ckbox">
												<input type="checkbox" id="checkbox1">
												<label for="checkbox1"></label>
											</div>
										</td>
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="images/encuesta.png" class="media-photo">
												</a>
												<div class="media-body">
													<span class="media-meta pull-right">Febrero 13, 2016</span>
													<h4 class="title">
                                                    Enquestes Mòdul Master	
														<span class="pull-right Cancelado">(Cerrada)</span>
													</h4>
													<p class="summary">Enquestes de final de semestre passades als estudiants dels mòduls de màster.<p>
                                                    <p>
                                                    <?php
                                                        echo "Permisos: <br>";
                                                        foreach($decodedEncuesta2 as $elemento => $permiso){
                                                            echo ($permiso['Permiso']." <i class='glyphicon glyphicon-arrow-right'></i> ".$permiso['Nivel']."<br>");
                                                            //print_r($permiso);
                                                        }
                                                        ?>
                                                    </p>
												</div>
											</div>
										</td>
									</tr>
                                    <tr data-status="Cerrada">
										<td>
											<div class="ckbox">
												<input type="checkbox" id="checkbox1">
												<label for="checkbox1"></label>
											</div>
										</td>
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="images/encuesta.png" class="media-photo">
												</a>
												<div class="media-body">
													<span class="media-meta pull-right">Febrero 13, 2016</span>
													<h4 class="title">
                                                    Enquestes PAAD	
														<span class="pull-right pagado">(Abierta)</span>
													</h4>
													<p class="summary">Enquestes passades als estudiants sobre l'actuació del professorat.<p>
                                                    <p>
                                                    <?php
                                                        echo "Permisos: <br>";
                                                        foreach($decodedEncuesta3 as $elemento => $permiso){
                                                            echo ($permiso['Permiso']." <i class='glyphicon glyphicon-arrow-right'></i> ".$permiso['Nivel']."<br>");
                                                            //print_r($permiso);
                                                        }

                                                        ?>
                                                    </p>
                                                </div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="content-footer">
					<p>
						Universitat Autònoma de Barcelona © - 2021 <br>
						Creado por <a href="#" target="_blank">Daniel Montesinos Santos</a>
					</p>
				</div>
			</div>
		</section>
		
	</div>
</div>
</html>