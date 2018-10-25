<?php
require '../modelo/DAO/GenericDAO.php';
require '../modelo/Usuario.php';
class usuarioCtl{
	private $DAO;

	public function listar(){
		$DAO = new GenericDAO();
		$DAO->query("SELECT * FROM usuario");
		foreach ($DAO->result() as $usu) {
			$date = date("d/m/Y", strtotime($usu['datanasc']));

			echo "<tr><th><img src ='../controle/arquivos/".$usu['imagem']."' height='50px' width='50px'/></th>
			<th>".$usu['id']."</th>
			<th>".$usu['nome']."</th>
			<th>".$usu['email']."</th>
			<th>".$usu['uf']."</th>
			<th>".$usu['cpf']."</th>
			<th>".$usu['telefone']."</th>";

			if($usu['adm'] == 1){
				echo "<th>Sim</th>";
			}else{
				echo "<th>Não</th>";
			}
			echo "<th>".$date."</th>
			<th><a href="."../controle/usuarioCtl.php?id=".$usu['id']."><button class='btn btn-danger'>Excluir</button></a></tr>";
		}
	}
	
	public function registrarADM(){
		$DAO = new GenericDAO();
		$usuario = new Usuario();
		$usuario->setNome($_POST['nome']);
		$usuario->setEmail($_POST['email']);
		$usuario->setCpf($_POST['cpf']);
		$usuario->setUf($_POST['uf']);
		$usuario->setCidade($_POST['cidade']);
		$usuario->setTelefone($_POST['telefone']);
		$usuario->setDatanasc($_POST['date']);
		$usuario->setSenha($_POST['senha']);
		$confirmarSenha = $_POST['confirmarSenha'];
		$usuario->setImagem($_FILES['imagem']);
		$imagem = $usuario->getImagem();

		if($usuario->getSenha() == $confirmarSenha){
			if(isset($imagem['tmp_name']) && !empty($imagem['tmp_name'])){
				$extensao = substr($_FILES['imagem']['name'], -4);
				print_r(move_uploaded_file($imagem['tmp_name'], 'arquivos/'.md5($usuario->getCpf()).$extensao));

				$DAO->insert("usuario", array(
					"nome" => $usuario->getNome(),
					"email" => $usuario->getEmail(),
					"telefone" => $usuario->getTelefone(),
					"cpf" => $usuario->getCpf(),
					"datanasc" => $usuario->getDatanasc(),
					"adm" => '1',
					"cidade" => $usuario->getCidade(),
					"imagem" => md5($usuario->getCpf()).$extensao,
					"senha" => $usuario->getSenha(),
					"uf" => $usuario->getUf()
				));
				echo "<script>location.href='../AreaAdministrativa/usuarios.php';</script>";
				exit;
			}
		}else{
			$mensagem = 'Senhas difirentes ou campos não preenchidos';
			header('location:../AreaAdministrativa/ui.php?mensagem='.$mensagem);
			exit;
		}
	}

	public function delete(){
		$DAO = new GenericDAO();
		$id = $_GET['id'];
		$DAO->remove("usuario", $id);
		header('location:../AreaAdministrativa/usuarios.php');
		exit;
	}
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$usuario = new usuarioCtl();
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	if($id == 0){
		$usuario->registrarADM();
	}else{

	}
}
if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['id']){
	$usuario = new usuarioCtl();
	$usuario->delete();
}