<?php
ini_set('display_errors', 0);
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap core CSS -->
	<link href="../ProjetoFlexbox/assets/MDB/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="../ProjetoFlexbox/assets/MDB/css/mdb.min.css" rel="stylesheet">
	
	<!-- Your custom styles (optional) -->
</head>
<body>

	<div style="height: 500px">
		<div class="flex-center flex-column">
			<h1 class="animated fadeIn mb-4">Seja Bem Vindo!</h1>

			<h5 class="animated fadeIn mb-3">Este site tem o intuito de aproximar professores e alunos.</h5>

			<p class="animated fadeIn text-muted">Será um prazer ter você conosco.</p>
		</div>
	</div>



	<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog cascading-modal" role="document">
			<!--Content-->
			<div class="modal-content">

				<!--Modal cascading tabs-->
				<div class="modal-c-tabs">

					<!-- Nav tabs -->
					<ul class="nav nav-tabs md-tabs tabs-2 light-blue darken" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-user mr-1"></i> Login</a>
						</li>
					</ul>

					<!-- Tab panels -->
					<div class="tab-content">
						<!--Panel 7-->
						<div class="tab-pane fade in show active" id="panel7" role="tabpanel">

							<!--Body-->
							<div class="modal-body mb-1">
								<form action="logar/login" method="post">
									<div class="md-form form-sm mb-5">
										<i class="fa fa-user prefix"></i>
										<input type="email" id="modalLRInput10" name="nome" class="form-control form-control-sm validate" required>
										<label data-error="wrong" data-success="right" for="modalLRInput10">Email</label>
									</div>

									<div class="md-form form-sm mb-4">
										<i class="fa fa-lock prefix"></i>
										<input type="password" id="modalLRInput11" name="senha" class="form-control form-control-sm validate" required>
										<label data-success="right" for="modalLRInput11">Senha</label>
									</div>
									<div style="margin-left: 30%;">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="defaultInline1" name="tipo" value="usuario">
											<label class="custom-control-label" for="defaultInline1">Aluno?</label>
										</div>

										<!-- Default inline 2-->
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="defaultInline2" name="tipo" value="professor">
											<label class="custom-control-label" for="defaultInline2">Professor?</label>
										</div>

									</div>

									<div class="text-center mt-2">
										<button class="btn btn-info">Enviar <i class="fa fa-sign-in ml-1"></i></button>
									</div>
								</form>
							</div>
							<!--Footer-->
							<div class="modal-footer">
								<div class="options text-center text-md-right mt-1">
									<p>Não tem conta? <a href="../ProjetoFlexbox/registrar" class="blue-text">Cadastre-se</a></p>
								</div>
								<button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/.Content-->
		</div>
	</div>
	<!--Modal: Login / Register Form-->

	<div class="text-center">
		<a href="" class="btn btn-default btn-rounded my-3" data-toggle="modal" data-target="#modalLRForm">Efetue o login ou Registre-se aqui</a>
	</div>

	<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/jquery-3.3.1.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/mdb.min.js"></script>
</body>
</html>