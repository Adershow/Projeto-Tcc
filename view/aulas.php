<?php include 'header.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
<body style="overflow-x: hidden;">
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4"><h3 style="margin-top: 15px;">Aulas marcadas</h3></div>
				<div class="col-md-4"><button class="btn btn-success" data-toggle="modal" data-target="#modalLRForm"  <?php if($_SESSION['tipo'] == "usuario"){?>style="display: none;" <?php }else{ ?> style="display: block;" <?php } ?>>Marcar Aula</button></div>
			</div>
		</div>
	</div>
</header>
<section>
	<form class="form-inline md-form mr-auto mb-4" action="aulas/listarAulas" method="post">
		<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search" style="width: 50%;
		margin-left: 20%;">
		<button class="fa fa-search btn-sm my-0" aria-hidden="true" style="background-color: white; border: none; cursor:pointer;" type="submit"></button>
	</form>
	<div class="row">
		<?php foreach ($_SESSION['dadosAula'] as $aulas) {?>

			<div class=".col-xl-4" style="margin-top: 10px;
			max-width: 400px;">
			<div class="card" style="margin-left: 25px;">
				<div class="card-body">
					<h5 class="card-title"><?php echo $aulas['nomeAula']; ?></h5>
					<p class="card-text"><?php if($_SESSION['tipo'] == "professor") {?> Alunos: <?php echo str_replace(',' , ', ', $aulas['usuarioNome']);}else{
						?> Professores: <?php echo explode(',', $aulas['professorNome'])[0];
					} ?></p>
					<p class="card-text">Data: <?php echo date('d/m/Y - H:i', strtotime($aulas['data'])); ?> -- <?php echo date('d/m/Y - H:i', strtotime($aulas['dataFinal'])); ?> </p>
					<p class="card-text"><?php echo $aulas['descricao']; ?></p>
					<form action="areaAula/listarDados" method="post">

						<button type="submit" name="id" value="<?php echo $aulas['idAula'];?>" class="btn btn-primary" style="margin: auto;" >Acessar</button>
					</form>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
</section>
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog cascading-modal" role="document">
		<!--Content-->
		<div class="modal-content">

			<!--Modal cascading tabs-->
			<div class="modal-c-tabs">

				<!-- Nav tabs -->
				<ul class="nav nav-tabs md-tabs tabs-2 light-blue darken" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-glasses mr-1"></i> Marcar Aula</a>
					</li>
				</ul>

				<!-- Tab panels -->
				<div class="tab-content">
					<!--Panel 7-->
					<div class="tab-pane fade in show active" id="panel7" role="tabpanel">

						<!--Body-->
						<div class="modal-body mb-1">
							<form action="aulas/inserirAula" method="post">
								<div class="md-form form-sm mb-5">
									<i class="fa fa-glasses prefix"></i>
									<input type="text" id="modalLRInput10" name="nome" class="form-control form-control-sm validate" required>
									<label data-error="wrong" data-success="right" for="modalLRInput10">Nome</label>
								</div>

								<div class="form-group">
									<i class="fa fa-align-justify prefix"></i>
									<label for="exampleFormControlTextarea2">Digite uma curta descrição sobre a aula</label>
									<textarea class="form-control rounded-0" id="exampleFormControlTextarea2" placeholder="Digite no maximo 400 caracteres" name="descricao" maxlength="400" required minlength="10" rows="3"></textarea>
								</div>
								<label for="exampleFormControlTextarea2">Digite uma data e o horario da aula</label>
								<div class="md-form form-sm mb-4">
									<i class="fa fa-calendar prefix"></i>
									<input type="datetime-local" id="modalLRInput10" name="dataInicial" class="form-control form-control-sm validate" required>
								</div>

								<label for="exampleFormControlTextarea2">Digite uma data e o horario de termino da aula</label>
								<div class="md-form form-sm mb-4">
									<i class="fa fa-calendar prefix"></i>
									<input type="datetime-local" id="modalLRInput10" name="dataFinal" class="form-control form-control-sm validate" required>
								</div>
								<i class="fa fa-book-open prefix"></i>
								<label for="exampleFormControlTextarea2">Escolha a materia</label>
								<div class="md-form form-sm mb-4">
									<select class="custom-select" id="basic" name="materias[]" multiple="multiple" style="margin-bottom: 10px;
									max-height: 100px;">
									<?php foreach ($_SESSION['materiasAula'] as $mat) {?>


										<option value="<?php echo $mat['id']; ?>"><?php echo $mat['nomes']; ?></option>
									<?php } ?>
								</select>
							</div>

							<select class="selectpicker" name="usuario[]" data-live-search="true" multiple>
								<?php foreach ($_SESSION['alunosList'] as $alunosList) { ?>
									<option value="<?php echo $alunosList['id']; ?>"><?php echo $alunosList['nome']; ?></option>
								<?php } ?>
							</select>
							<div class="text-center mt-2">
								<button class="btn btn-info">Enviar <i class="fa fa-sign-in ml-1"></i></button>
							</div>
						</form>
					</div>
					<!--Footer-->
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal" style="margin-right: 38%;">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/.Content-->
</div>
</div>
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/mdb.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>
</body>