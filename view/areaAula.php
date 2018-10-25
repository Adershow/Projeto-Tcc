<?php include 'header.php'; ?>
<section>
<div class="card-deck" style="margin-left: 2%;
margin-right: 2%;
margin-top: 20px;">
<?php foreach($_SESSION['dadosAreaAulaProf'] as $prof){?>
<div style="margin: auto;
margin-top: 15px;">
<div class="card  mb-4" style="min-width: 350px;
	max-width: 400px ;">

	<div class="view overlay">

		<img class="card-img-top" src="../ProjetoFlexbox/controle/arquivos/<?php echo $prof['imagem']; ?>" alt="Card image cap" style=" max-height: 322px;
		border-radius: 20px;
		max-width: 300px;
		margin: auto;
		min-height: 322px;
		min-width: 300px;
		">
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
<div style="margin-left: 20%; margin-right: 20%;">
<table class="table table"  style="margin: auto;">
<thead >
    <tr>
		<th scope="col"></th>
		<th scope="col">Nome</th>
      <th scope="col">Imagem</th>
    </tr>
  </thead>
<?php }foreach($_SESSION['dadosAreaAulaUsu'] as $usu){?>
  <tbody>
    <tr>
	  <td><h4>Aluno: </h4></td>
	  <td><?php echo $usu['nomeUsuario']; ?></td>
      <td><img src="../ProjetoFlexbox/controle/arquivos/<?php echo $usu['imagemAl'];?>" width="50px" height="50px" /></td>   
    </tr>
  </tbody>

<?php }?>
</table>
</div>
<div style="margin: auto; text-align:center;"> <h2> Dados da Aula </h2> </div>
<form action="areaAula/update" method="post">
<div class="tabela" >
<?php foreach($_SESSION['selectAulas'] as $al){?>
		<ul class="list-group" style="margin-left: 20%; margin-right: 20%;">
<li class="list-group-item">Nome: <input type="text" id="nome" name="nome" style="border: none;" readonly value="<?php echo $al['nomeAula']; ?>"/> <a  id="nomeBtn" onclick="edita('nomeBtn', 'nome');" style="margin-left: 100%;"><?php if($_SESSION['tipo'] == 'professor'){ ?><i class="fas fa-edit"></i><?php }else{}?></a></li>
			<li class="list-group-item">Data Inicial: <input type="text" id="email" name="dataInicial" style="border: none;" readonly value="<?php echo $al['data']; ?>" /><a  id="nomeBtn1" onclick="edita('nomeBtn1', 'email');" style="margin-left: 100%;"><?php if($_SESSION['tipo'] == 'professor'){ ?><i class="fas fa-edit"></i><?php }else{}?></a></li>
			<li class="list-group-item">Data Final: <input type="text" id="cpf" name="dataFinal" style="border: none;" readonly value="<?php echo $al['dataFinal']; ?>" /><a  id="nomeBtn2" onclick="edita('nomeBtn2', 'cpf');" style="margin-left: 100%;"><?php if($_SESSION['tipo'] == 'professor'){ ?><i class="fas fa-edit"></i><?php }else{}?></a> </li>
				<li class="list-group-item">Descricao: <input type="text" id="cidade" name="descricao" style="border: none;" readonly value="<?php echo $al['descricao']; ?>" /><a  id="nomeBtn4" onclick="edita('nomeBtn4', 'cidade');" style="margin-left: 100%;"><?php if($_SESSION['tipo'] == 'professor'){ ?><i class="fas fa-edit"></i><?php }else{}?></a> </li>
		</ul>
<?php } ?>
	<ul class="list-group" style="margin-left: 20%; margin-right: 20%;">
			<?php if($_SESSION['tipo'] == 'professor'){ ?><li class="list-group-item"><button class="btn btn-success" value="<?php echo $al['idAula'] ?>" name="id">Salvar Alterações</button></a></li><?php }else{} ?>
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
