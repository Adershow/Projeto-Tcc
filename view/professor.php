<?php
error_reporting(0);
ini_set(“display_errors”, 0 );
?>
<?php include ('header.php'); ?>
<form class="form-inline md-form mr-auto mb-4" action="professor/listarProfessores" method="post">
<div class="form-group row"style="width: 50%;
	margin-left: 20%;">
	<input class="form-control col-md-10" type="text" placeholder="Search" aria-label="Search" name="search"
	">
	<button class="fa fa-search form-control col-md-1" aria-hidden="true" style="background-color: white; border: none; cursor:pointer;" type="submit"></button></div>
</form>

<form action="professor/filtro" method="post">
	<div class="form-group row"style="width: 50%;
	margin-left: 20%;">
	<select class="form-control col-md-10" name="selecionarMateria">
	<?php foreach ($_SESSION['materias'] as $mat) {?>
		<option value="<?php echo $mat['nomes']; ?>"><?php echo $mat['nomes']; ?></option>
	<?php } ?>
</select>
<button class="fa fa-search form-control col-md-1" aria-hidden="true" style="background-color: white;
	border: none;" type="submit"></button></div></form>


<div class="card-deck" style="margin-left: 2%;
margin-right: 2%;
margin-top: 20px;">
<?php 
foreach($_SESSION['professores'] as $prof){?>

	<div class="card  mb-4" style="min-width: 300px;
	max-width: 400px ;">

	<div class="view overlay">

		<img class="card-img-top" src="../ProjetoFlexbox/controle/arquivos/<?php echo $prof['imagem'];?>" alt="Card image cap" style=" max-height: 322px;
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

		<h4 class="card-title"><?php echo explode(' ', $prof['nome'])[0]; ?></h4>

		<p class="card-text"><?php echo str_replace(',' , ', ', $prof['nomes']); ?></p>

		<form action="areaProfessor/listarDados" method="post">

			<button type="submit" name="id" value="<?php echo $prof['id'];?>" class="btn btn-primary" style="margin: auto;" >Acessar</button>
		</form>
	</div>

</div>

<?php }?>

</div>
<nav aria-label="pagination example">
	<ul class="pagination pagination-lg justify-content-center">

		<!--Arrow left-->
		<li class="page-item">
			<?php
			if(isset($_SESSION['paginaAtual']) && $_SESSION['paginaAtual'] != 1){
				$page_back = $_SESSION['paginaAtual'] - 1;
			}else{
				$_SESSION['paginaAtual'] = 1;
				$page_back = $_SESSION['paginaAtual'] - 1;
			}
			?>
			<form action="professor/previewNext" method="post">
				<button type="submit" name="preview" value="<?php echo $page_back;?>" style=" background-color: white;" class="page-link" aria-label="Next">&laquo;</button>
				<span class="sr-only">Previous</span>
			</form>
		</li>

		<!--Numbers-->
		<?php while($i < $_SESSION['numero']) { $i++;?>
			<form action="professor/limite" method="post">
				<input type="hidden" name="page" value="<?php echo $i; ?>">
				<input type="submit" style="border-width: 1px; background-color: white; margin-top: 10px; margin-right: 5px;" value="<?php echo $i; ?>" class="page-item">
			</form>
		<?php }?>
		<!--Arrow right-->
		<li class="page-item">
			<?php
			if(isset($_SESSION['paginaAtual'])){
				$page_go = $_SESSION['paginaAtual'] + 1;
			}else{
				$_SESSION['paginaAtual'] = 1;
				$page_go = $_SESSION['paginaAtual'] + 1;
			}
			?>
			<form action="professor/previewNext" method="post">
				<button type="submit" name="next" value="<?php echo $page_go;?>" style=" background-color: white;" class="page-link" aria-label="Next">&raquo;</button>
				<span class="sr-only">Next</span>
			</a>
		</form>
	</li>
</ul>
</nav>

<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../ProjetoFlexbox/assets/MDB/js/mdb.min.js"></script>

