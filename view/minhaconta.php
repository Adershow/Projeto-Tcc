<?php include ('header.php'); ?>
<link href="../ProjetoFlexbox/assets/css/minhaconta.css" rel="stylesheet">
<?php foreach ($_SESSION['dados'] as $dados) { ?>
	<section>
		<div style="width: 100%">
			<form action="minhaconta/update" method="post" enctype="multipart/form-data" id="myForm">
				<input type="file" class="fileinput" name="foto" size="60" onchange="readURL(this,'mini_foto_new1');" style="cursor:pointer; background:#FFF;" hidden  id="inputImage"/>

				<img id="mini_foto_new" data-toggle="modal" data-target="#modalLRFormImagem" alt="thumbnail" src="<?php if($dados['imagem1'] == null){ ?> /ProjetoFlexbox/assets/arquivos/no-thumbnail.png <?php }else{ ?>/ProjetoFlexbox/assets/arquivos/<?php echo $dados['imagem1']; } ?>" class="img-thumbnail croppie-container" style="cursor: pointer;" />
				<img src="../ProjetoFlexbox/controle/arquivos/<?php echo $dados['imagem'];?>" class="img-perfil">

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
		<div class="modal-dialog cascading-modal" role="document" style="margin-left: 300px;
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
							<img id="mini_foto_new1" alt="thumbnail" src="<?php if($dados['imagem1'] == null){ ?> /ProjetoFlexbox/assets/arquivos/no-thumbnail.png <?php }else{ ?>/ProjetoFlexbox/assets/arquivos/<?php echo $dados['imagem1']; } ?>" class=" croppie-container" style="cursor: pointer;
							min-width: 674.5px;" />

						</div>

						<div class="text-center mt-2">
							<button class="btn btn-info">Enviar <i class="fa fa-sign-in ml-1"></i></button>
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
<!-- Croppie core JavaScript -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/Croppie/croppie.js"></script>
<!-- Imagem JavaScript -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/js/imagem.js"></script>
</body>
</html>