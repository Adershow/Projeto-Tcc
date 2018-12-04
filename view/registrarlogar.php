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
	<link rel="stylesheet" type="text/css" href="../ProjetoFlexbox/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../ProjetoFlexbox/assets/css/registrar.css">
	<!-- Your custom styles (optional) -->
	<link href="../ProjetoFlexbox/assets/MDB/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
</head>
<body>
	<section style="max-width: 50%;
	margin: auto;">
	<div class="card">

		<h5 class="card-header info-color white-text text-center py-4">
			<strong class="botoes"><a href="#" onclick="al('aluno','prof')" >Registre-se como Aluno</a></strong>
			<strong class="botoes"><a href="#" onclick="prof('prof', 'aluno')">Registre-se como Professor</a></strong>
		</h5>

		<!--Card content-->
		<div class="card-body px-lg-5 pt-0" id="aluno">

			<!-- Form -->
			<form class="text-center" style="color: #757575;" method="post" action="registrar/usuarioRegistrar" enctype="multipart/form-data">

				<div class="form-row">
					<div class="col">
						<!-- First name -->
						<div class="md-form">
							<input type="text" id="materialRegisterFormFirstName" class="form-control" name="nome" required>
							<label for="materialRegisterFormFirstName">Nome</label>
						</div>
					</div>
				</div>

				<!-- E-mail -->
				<div class="md-form mt-0">
					<input type="email" id="materialRegisterFormEmail" class="form-control" name="email" required>
					<label for="materialRegisterFormEmail">Email</label>
				</div>

				<!-- Password -->
				<div class="md-form">
					<input type="password" id="materialRegisterFormPassword" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" name="senha" required>
					<label for="materialRegisterFormPassword">Senha</label>
				</div>


				<div class="md-form">
					<input type="password" id="materialRegisterFormPassword" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" name="confirmarSenha" required>
					<label for="materialRegisterFormPassword">Confirmar Senha</label>
				</div>

				<div class="form-row">
					<div class="col">
						<!-- First name -->
						<div class="md-form">
							<input type="text" id="materialRegisterFormFirstName" maxlength="11" minlength="11" class="form-control" name="cpf" required>
							<label for="materialRegisterFormFirstName">CPF</label>
							<small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
								Somente números
							</small>
						</div>
					</div>
				</div>

				<div class="form-row">
					<div class="col">
						<!-- First name -->
						<div class="md-form">
							<select class="selectpicker" name="estados[]" data-live-search="true">
								<?php foreach ($_SESSION['estado'] as $estados) { ?>
									<option value="<?php echo $estados['uf'].",".$estados['nome']; ?>"><?php echo $estados['uf'].": ".$estados['nome']; ?></option>
								<?php } ?>
							</select>

						</div>
					</div>
				</div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
					</div>
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="imagem" required>
						<label class="custom-file-label" for="inputGroupFile01">Selecione o arquivo</label>
					</div>
				</div>

				<button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Registrar</button>

			</form>
			<!-- Form -->

		</div>

		<div class="card-body px-lg-5 pt-0" style="display: none;" id="prof">

			<!-- Form -->
			<form class="text-center" style="color: #757575;" method="post" action="registrar/professorRegistrar" enctype="multipart/form-data">

				<div class="form-row">
					<div class="col">
						<!-- First name -->
						<div class="md-form">
							<input type="text" id="materialRegisterFormFirstName" class="form-control" name="nome" required>
							<label for="materialRegisterFormFirstName">Nome</label>
						</div>
					</div>
				</div>

				<!-- E-mail -->
				<div class="md-form mt-0">
					<input type="email" id="materialRegisterFormEmail" class="form-control" name="email" required>
					<label for="materialRegisterFormEmail">Email</label>
				</div>

				<!-- Password -->
				<div class="md-form">
					<input type="password" id="materialRegisterFormPassword" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" name="senha" required>
					<label for="materialRegisterFormPassword">Senha</label>
				</div>

				<div class="md-form">
					<input type="password" id="materialRegisterFormPassword" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" name="confirmarSenha" required>
					<label for="materialRegisterFormPassword">Confirmar Senha</label>
				</div>

				<div class="md-form">
					<input type="date" id="materialRegisterFormPassword" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" name="date" required>
				</div>

				<div class="form-row">
					<div class="col">
						<!-- First name -->
						<div class="md-form">
							<input type="text" id="materialRegisterFormFirstName" maxlength="11" minlength="11" class="form-control" name="cpf" required>
							<label for="materialRegisterFormFirstName">CPF</label>
							<small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
								Somente números
							</small>
						</div>
					</div>
				</div>

				<div class="form-row">
					<div class="col">
						<!-- First name -->
						<div class="md-form">
							<select class="selectpicker" name="estados[]" data-live-search="true">
								<?php foreach ($_SESSION['estado'] as $estados) { ?>
									<option value="<?php echo $estados['uf'].",".$estados['nome']; ?>"><?php echo $estados['uf'].": ".$estados['nome']; ?></option>
								<?php } ?>
							</select>

						</div>
					</div>
				</div>

				<div class="form-row">
					<div class="col">
						<!-- First name -->
						<div class="md-form">
							<input type="text" id="materialRegisterFormFirstName" class="form-control" name="endereco" required>
							<label for="materialRegisterFormFirstName">Endereço</label>
						</div>
					</div>
				</div>
				<label>Escolha uma ou mais de uma matéria</label>
				<select class="custom-select" id="basic" multiple="multiple" name="materias[]" style="margin-bottom: 10px;
				max-height: 100px;">
				<?php foreach ($_SESSION['materias'] as $mat) { ?>
					

					<option value="<?php echo $mat['id']; ?>"><?php echo $mat['nomes']; ?></option>
					<?php 
				} ?>
			</select>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
				</div>
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="imagem" required>
					<label class="custom-file-label" for="inputGroupFile01">Selecione o arquivo</label>
				</div>
			</div>

			<div class="form-group">
				<label for="exampleFormControlTextarea2">Digite uma curta descrição sobre você</label>
				<textarea class="form-control rounded-0" id="exampleFormControlTextarea2" placeholder="Digite no maximo 100 caracteres" name="descricao" maxlength="100" minlength="10" rows="3"></textarea>
			</div>

			<button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Registrar</button>

		</form>
		<!-- Form -->

	</div>

</div>
</section>

<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/mdb.min.js"></script>
<script type="text/javascript" src="../ProjetoFlexbox/assets/js/script.js"></script>
<script type="text/javascript" src="../ProjetoFlexbox/assets/js/iniciar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>
</body>
</html>