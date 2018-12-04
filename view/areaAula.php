<?php include 'header.php';?>
<link href="../ProjetoFlexbox/assets/css/areaAula.css" rel="stylesheet">
<section>
	<div class="card-deck">
		<?php foreach ($_SESSION['dadosAreaAulaProf'] as $prof) {?>
			<div >
				<div class="card  mb-4">

					<div class="view overlay">

						<img class="card-img-top" src="../ProjetoFlexbox/controle/arquivos/Professor_<?php echo $prof['cpf']; ?>/<?php echo $prof['imagem']; ?>" alt="Card image cap">
						<a href="#">
							<div class="mask rgba-white-slight waves-effect waves-light"></div>
						</a>
					</div>

					<div class="card-body">
						<h4 class="card-title"><?php echo explode(' ', $prof['nomeProfessor'])[0]; ?></h4>
					</div>
				</div>
			</div>

		</div><div></div>
		<div class="div-table">
			<table class="table table">
				<thead >
					<tr>
						<th scope="col"></th>
						<th scope="col">Nome</th>
						<th scope="col">Imagem</th>
					</tr>
				</thead>
				<?php
			}
			foreach ($_SESSION['dadosAreaAulaUsu'] as $usu) {?>
				<tbody>
					<tr>
						<td><h4>Aluno: </h4></td>
						<td><h4><?php echo $usu['nomeUsuario']; ?></h4></td>
						<td><img src="../ProjetoFlexbox/controle/arquivos/Usuario_<?php echo $usu['cpf']; ?>/<?php echo $usu['imagemAl']; ?>" width="50px" height="50px" /></td>
					</tr>
				</tbody>

				<?php
			}?>
		</table>
	</div>
	<div class="areaAula" > <h2> Dados da Aula </h2> </div>
	<form action="areaAula/update" method="post">
		<div class="tabela" >
			<?php foreach ($_SESSION['selectAulas'] as $al) {?>
				<ul class="list-group">
					<li class="list-group-item">Nome: <input type="text" id="nome" name="nome" readonly value="<?php echo $al['nomeAula']; ?>"/> <a  id="nomeBtn" onclick="edita('nomeBtn', 'nome');"><?php if ($_SESSION['tipo'] == 'professor') {?><i class="fas fa-edit"></i><?php
				} else {
				}?></a></li>
				<li class="list-group-item">Data Inicial: <input type="text" id="email" name="dataInicial" readonly value="<?php echo $al['data']; ?>" /><a  id="nomeBtn1" onclick="edita('nomeBtn1', 'email');"><?php if ($_SESSION['tipo'] == 'professor') {?><i class="fas fa-edit"></i><?php
			} else {
			}?></a></li>
			<li class="list-group-item">Data Final: <input type="text" id="cpf" name="dataFinal" readonly value="<?php echo $al['dataFinal']; ?>" /><a  id="nomeBtn2" onclick="edita('nomeBtn2', 'cpf');"><?php if ($_SESSION['tipo'] == 'professor') {?><i class="fas fa-edit"></i><?php
		} else {
		}?></a> </li>
		<li class="list-group-item">Descricao: <textarea type="text" rows="7" class="form-control" id="cidade" name="descricao" style="" readonly value="<?php echo $al['descricao']; ?>" ><?php echo $al['descricao']; ?></textarea><a  id="nomeBtn4" onclick="edita('nomeBtn4', 'cidade');"><?php if ($_SESSION['tipo'] == 'professor') {?><i class="fas fa-edit"></i><?php
	} else {
	}?></a> </li>
</ul>
<?php
}?>
<ul class="list-group">
	<?php if ($_SESSION['tipo'] == 'professor') {?><li class="list-group-item"><button class="btn btn-success" value="<?php echo $al['idAula'] ?>" name="id">Salvar Alterações</button></a></li><?php
} else {
}?>
</ul>
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
