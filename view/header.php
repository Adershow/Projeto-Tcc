<?php
require '../ProjetoFlexbox/controle/site/logarCtl.php';
$lista = new logarCtl();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<!-- Bootstrap core CSS -->
	<link href="../ProjetoFlexbox/assets/MDB/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="../ProjetoFlexbox/assets/MDB/css/mdb.min.css" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href="../ProjetoFlexbox/assets/MDB/css/style.css" rel="stylesheet">
	<link href="../ProjetoFlexbox/assets/css/professor.css" rel="stylesheet">
	<link rel="stylesheet" href="../ProjetoFlexbox/assets/Croppie/croppie.css" />

	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

</head>

<body>

	<!-- Start your project here-->
	<nav class="navbar navbar-expand-lg navbar-dark indigo">

		<!-- Navbar brand -->
		<a class="navbar-brand" href="../ProjetoFlexbox">Início</a>

		<!-- Collapse button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
		aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<!-- Collapsible content -->
	<div class="collapse navbar-collapse" id="basicExampleNav">

		<!-- Links -->
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="professor/listarProfessores">Professores</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="chat">Chat's</a>
			</li>

			<!-- Dropdown -->
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mais</a>
				<div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="minhaconta/listarDados">Perfil</a>
					<a class="dropdown-item" href="aulas/listarAulas">Aulas marcadas</a>
				</div>
			</li>

		</ul>
		<!-- Links -->
		<form class="form-inline" action="logar/deslogar" method="get">

			<div class="md-form my-0">

				<div class="mr-sm-2">

					<li class="login" style="color: white;"><?php echo $_SESSION['login']; ?></a></li>
					<li class="login" style="color: white;"><?php echo $_SESSION['email']; ?></a></li>
				</div>
			</div>
			<button class="btn btn-danger" style="font-size: 15px;
			border-radius: 7.5px;">LOGOUT</button>
		</form>
	</div>
	<!-- Collapsible content -->
</nav>