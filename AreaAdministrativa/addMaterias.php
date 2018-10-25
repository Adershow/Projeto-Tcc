<? include "header.php"; ?>
<body>
	<div id="page-wrapper" >
		<div id="page-inner">
			<div class="row">
				<div class="col-md-12">
					<h2>Registrar Materias</h2>
				</div>
			</div>
			<!-- /. ROW  -->
			<hr />
			<div class="registrarusu" id="aluno">
				<form class="registrarusu1" action="../controle/materiasCtl.php" method="post">
					<input type="text" name="nome" placeholder="Nome" class="form-control" /><br/>
					<textarea type='textarea' name='descricao' placeholder="descricao" class='form-control'></textarea><br/>
					<input type="submit" class="btn btn-primary">
				</form>
			</div>
		</body>