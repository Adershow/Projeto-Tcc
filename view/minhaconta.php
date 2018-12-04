<?php include ('header.php'); ?>
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.0/croppie.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.0/croppie.js"></script>
<link href="../ProjetoFlexbox/assets/css/minhaconta.css" rel="stylesheet">
<style type="text/css">
input[type="file"] {
	cursor: pointer;
}
button:focus {
	outline: 0;
}
.file-btn {
	position: relative;
}
.file-btn input[type="file"] {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	opacity: 0;
}
.upload-demo .upload-demo-wrap,
.upload-demo .upload-result,
.upload-demo.ready .upload-msg {
	display: none;
}
.upload-demo.ready .upload-demo-wrap {
	display: block;
}
.upload-demo.ready .upload-result {
	display: inline-block;
}
.upload-demo-wrap {
	width: 300px;
	height: 300px;
	margin: 0 auto;
}
.upload-msg {
	text-align: center;
	padding: 50px;
	font-size: 22px;
	color: #aaa;
	width: 300px;
	height: 300px;
	margin: 0 auto;
	border: 1px solid #aaa;
}
</style>
<?php foreach ($_SESSION['dados'] as $dados) { ?>
	<section>
		<div style="width: 100%">
			<form action="minhaconta/update" method="post" enctype="multipart/form-data" id="myForm">

				<input type='text' id="inputImg" name="foto" hidden />
				<input type='text' id="inputImgPerf" name="fotoPerf" hidden />

				<img id="cropped" name="cropped" data-toggle="modal" data-target="#modalLRFormImagem" alt="thumbnail" src="<?php if($dados['imagem1'] == null){ ?>/ProjetoFlexbox/assets/arquivos/no-thumbnail.png <?php } else{  if($_SESSION['tipo'] == 'professor'){?> ../ProjetoFlexbox/controle/arquivos/Professor_<?php echo $dados['cpf'] ?>/<?php echo $dados['imagem1']; }else{?> ../ProjetoFlexbox/controle/arquivos/Usuario_<?php echo $dados['cpf'] ?>/<?php echo $dados['imagem1']; } } ?>" class="img-thumbnail croppie-container" style="cursor: pointer;" />

				<img id="croppedPerf" data-toggle="modal" data-target="#modalLRFormImagemPerf" src="../ProjetoFlexbox/controle/arquivos/<?php if($_SESSION['tipo'] == 'professor'){ echo "Professor_"; }else{ echo "Usuario_"; }echo $dados['cpf']; ?>/<?php echo $dados['imagem']; ?>" class="img-perfil" style="cursor: pointer;">

				<div class="tabela">
					<ul class="list-group" >
						<li class="list-group-item">Nome: <input type="text" id="nome" name="nome" style="border: none;" readonly value="<?php echo $dados['nome']; ?>"/> <a  id="nomeBtn" onclick="edita('nomeBtn', 'nome');" style="margin-left: 100%;"><i class="fas fa-edit"></i></a></li>
						<li class="list-group-item">Email: <input type="text" id="email" name="email" style="border: none;" readonly value="<?php echo $dados['email']; ?>" /><a  id="nomeBtn1" onclick="edita('nomeBtn1', 'email');" style="margin-left: 100%;"><i class="fas fa-edit"></i></a></li>
						<li class="list-group-item">CPF: <input type="text" id="cpf" name="cpf" style="border: none;" readonly value="<?php echo $dados['cpf']; ?>" /><a  id="nomeBtn2" onclick="edita('nomeBtn2', 'cpf');" style="margin-left: 100%;"><i class="fas fa-edit"></i></a> </li>
						<li class="list-group-item">UF: <input type="text" id="uf" name="uf" style="border: none;" readonly value="<?php echo $dados['uf']; ?>" /> <a  id="nomeBtn3" onclick="edita('nomeBtn3', 'uf');" style="margin-left: 100%;"><i class="fas fa-edit"></i></a></li>
						<li class="list-group-item">Cidade: <input type="text" id="cidade" name="cidade" style="border: none;" readonly value="<?php echo $dados['cidade']; ?>" /><a  id="nomeBtn4" onclick="edita('nomeBtn4', 'cidade');" style="margin-left: 100%;"><i class="fas fa-edit"></i></a></li>

					</ul>
					<ul class="list-group">
						<li class="list-group-item"><button class="btn btn-success" value="<?php echo $dados['id'] ?>" name="id">Salvar Alterações</button></a></li>
					</ul>
				</div>
			</form>
		</div>
	<?php }?>

	<div class="modal fade" id="modalLRFormImagem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog cascading-modal"  role="document" style="margin-left: 300px;
		margin-top: 30px;">
		<!--Content-->
		<div class="modal-content" style="width: 1050px;">

			<!--Modal cascading tabs-->
			<div class="modal-c-tabs">

				<!-- Nav tabs -->
				<!-- Tab panels -->
				<div class="tab-content" style="width: 100%;">
					<!--Panel 7-->
					<div class="tab-pane fade in show active" id="panel7" role="tabpanel">
						<!--Body-->
						<h3 style="margin-left: 200px;">Selecione uma Imagem</h3>
						<div class="modal-body mb-1" style="width: 100%;">

							<img id="cropped" name="cropped" />
							<div class="demo-wrap upload-demo1">
								<div class="container">
									<div class="grid">
										<div class="actions">
											<a class="btn file-btn" hidden>
												<input type="file" id="upload" name="upload" value="Choose a file" accept="image/*" hidden/>
											</a>
											<img id="mini_foto_new1" alt="thumbnail" src="<?php if($dados['imagem1'] == null){ ?> /ProjetoFlexbox/assets/arquivos/no-thumbnail.png <?php }else{ if($_SESSION['tipo'] == 'professor'){?>../ProjetoFlexbox/controle/arquivos/Professor_<?php echo $dados['cpf'] ?>/<?php echo $dados['imagem1']; ?><?php }else{ ?>../ProjetoFlexbox/controle/arquivos/Usuario_<?php echo $dados['cpf'] ?>/<?php echo $dados['imagem1']; } }  ?>" class=" croppie-container" style="cursor: pointer;
											min-width: 674.5px;
											max-width: 1000px;" />
										</div>

										<div id="hidden-demo" class="upload-demo-wrap" style="margin-right: 800px;">
											<div id="upload-demo"></div>
										</div>
									</div>
								</div>

							</div>

						</div>

						<div class="text-center mt-2">
							<button class="btn btn-info upload-result" id="imgButton" style="margin-top: 100px;">Enviar <i class="fa fa-sign-in ml-1"></i></button>
						</div>
						<br/>

					</div>
					<!--Footer-->
					<div class="modal-footer " style="margin-right: 280px;">
						<button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/.Content-->
</div>

<div class="modal fade" id="modalLRFormImagemPerf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog cascading-modal"  role="document" style="margin-left: 600px;
	margin-top: 30px;">
	<!--Content-->
	<div class="modal-content" style="width: 750px;">

		<!--Modal cascading tabs-->
		<div class="modal-c-tabs">

			<!-- Nav tabs -->
			<!-- Tab panels -->
			<div class="tab-content" style="width: 100%;">
				<!--Panel 7-->
				<div class="tab-pane fade in show active" id="panel7" role="tabpanel">
					<!--Body-->
					<h3 style="margin-left: 200px;">Selecione uma Imagem</h3>
					<div class="modal-body mb-1" style="width: 100%;">

						<img id="cropped" name="cropped" />
						<div class="demo-wrap upload-demo1">
							<div class="container">
								<div class="grid">
									<div class="actions">
										<a class="btn file-btn" hidden>
											<input type="file" id="uploadPerf" name="uploadPerf" value="Choose a file" accept="image/*" hidden/>
										</a>

										<img id="croppedPerfil" src="../ProjetoFlexbox/controle/arquivos/<?php if($_SESSION['tipo'] == 'professor'){ echo "Professor_"; }else{ echo "Usuario_"; }echo $dados['cpf']; ?>/<?php echo $dados['imagem']; ?>" class="img-perfilModal" style="cursor: pointer;">
										]
									</div>

									<div id="hidden-demo" class="upload-demo-wrap" style="margin-right: 800px;">
										<div id="upload-demo"></div>
									</div>
								</div>
							</div>

						</div>

					</div>

					<div class="text-center mt-2">
						<button class="btn btn-info upload-result" id="imgButton" style="margin-top: 100px;">Enviar <i class="fa fa-sign-in ml-1"></i></button>
					</div>
					<br/>

				</div>
				<!--Footer-->
				<div class="modal-footer " style="margin-right: 280px;">
					<button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!--/.Content-->
</div>

</form>
</section>


<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/mdb.min.js"></script>
<script type="text/javascript" src="../ProjetoFlexbox/assets/Croppie/croppie.js"></script>

<script type="text/javascript">

	$('#cropped').on('click', function(){
		$('#mini_foto_new1').show();
		$('#hidden-demo').hide();
	});

	$('#croppedPerf').on('click', function(){
		$('#croppedPerfil').show();
		$('#hidden-demo').hide();
	});

	$('#mini_foto_new1').on('click', function() {
		$('#upload').trigger('click');
	});

	$('#croppedPerfil').on('click', function() {
		$('#uploadPerf').trigger('click');
	});


	var Demo = (function() {

		function popupResult(result) {
			var html;
			if (result.html) {
				jQuery("#cropped").attr("src", html);
			}
			if (result.src) {
				jQuery("#cropped").attr("src", result.src);
				$('#inputImg').attr('value', result.src);
			}

		}

		function demoUpload() {
			var $uploadCrop;

			function readFile(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						jQuery('#hidden-demo').show();
						jQuery('.upload-demo').addClass('ready');
						jQuery('#mini_foto_new1').hide();
						$uploadCrop.croppie('bind', {
							url: e.target.result
						}).then(function() {
							console.log('jQuery bind complete');
						});

					}

					reader.readAsDataURL(input.files[0]);
				} else {
					alert("Sorry - you're browser doesn't support the FileReader API");
				}
			}

			$uploadCrop = jQuery('#upload-demo').croppie({
      // url: 'https://httpsimage.com/lock.png',
      enableExif: true,
      viewport: {
      	width: 875,
      	height: 400,
      },
      boundary: {
      	width: 1000,
      	height: 400
      },
      enableExif: true
  });

			jQuery('#upload').on('change', function() {
				readFile(this);
			});
			jQuery('.upload-result').on('click', function(ev) {
				$uploadCrop.croppie('result', {
					type: 'canvas',
					size: 'viewport'
				}).then(function(resp) {
					popupResult({
						src: resp
					});
				});
			});
		}

		function init() {
			demoUpload();
		}

		return {
			init: init
		};
	})();
	Demo.init();
</script>
</body>
</html>