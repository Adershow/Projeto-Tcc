<?php
require '../ProjetoFlexbox/modelo/DAO/GenericDAO.php';
require '../ProjetoFlexbox/modelo/Usuario.php';
require '../ProjetoFlexbox/modelo/Professor.php';
class registrarCtl extends controller
{
	
	public function index(){

		session_start();
		$DAO = new GenericDAO();

		$DAO->query("SELECT * FROM materias"); 
		$_SESSION['materias'] = $DAO->result();
		$this->loadView('registrarlogar');
	}

	public function verificaCpf($cpf){

		if (($cpf != '11111111111') && ($cpf !=  '22222222222') && ($cpf !=  '33333333333') && ($cpf !=  '44444444444') && ($cpf !=  '55555555555') && ($cpf !=  '66666666666') && ($cpf !=  '77777777777') && ($cpf !=  '88888888888') && ($cpf !=  '99999999999')){   
			for ($t = 9; $t < 11; $t++) {
				
				for ($d = 0, $c = 0; $c < $t; $c++) {
					$d += $cpf{$c} * (($t + 1) - $c);
				}
				$d = ((10 * $d) % 11) % 10;
				if ($cpf{$c} != $d) {
					return false;
					exit;
				}
			}
			return true;
		}else{
			return false;
			exit;
		}
	}

	public function verificaEmail($tipo ,$email){
		$DAO = new GenericDAO();
		$usuario = new Usuario();

		$DAO->query("SELECT * FROM ".$tipo." WHERE email = '".$email."'"); 

		if(sizeof($DAO->result()) == 0){
			return true;
		}else{
			return false;
		}
	}

	public function usuarioRegistrar(){
		$DAO = new GenericDAO();
		$usuario = new Usuario();

		$usuario->setNome($_POST['nome']);
		$usuario->setEmail($_POST['email']);
		$usuario->setCpf($_POST['cpf']);
		$usuario->setUf($_POST['uf']);
		$usuario->setCidade($_POST['cidade']);
		$usuario->setDatanasc($_POST['date']);
		$usuario->setSenha($_POST['senha']);
		$confirmarSenha = $_POST['confirmarSenha'];
		$usuario->setImagem($_FILES['imagem']);
		$imagem = $usuario->getImagem();		

		if($this->verificaEmail('usuario' ,$usuario->getEmail()) == true){
			if($this->verificaCpf($usuario->getCpf()) == true){
				if($usuario->getSenha() == $confirmarSenha){
					if(isset($imagem['tmp_name']) && !empty($imagem['tmp_name'])){
						$extensao = substr($_FILES['imagem']['name'], -4);
						print_r(move_uploaded_file($imagem['tmp_name'], '../ProjetoFlexbox/controle/arquivos/'.md5($usuario->getCpf()).$extensao));

						$DAO->insert("usuario", array(
							"nome" => $usuario->getNome(),
							"email" => $usuario->getEmail(),
							"cpf" => $usuario->getCpf(),
							"datanasc" => $usuario->getDatanasc(),
							"adm" => '0',
							"cidade" => $usuario->getCidade(),
							"imagem" => md5($usuario->getCpf()).$extensao,
							"senha" => $usuario->getSenha(),
							"uf" => $usuario->getUf()
						));
						echo"<script language='javascript' type='text/javascript'>alert('Registrado com sucesso');window.location.href='../logar';</script>";
						exit;
					}
				}else{
					echo"<script language='javascript' type='text/javascript'>alert('Dados não preenchidos ou senhas não identicas');window.location.href='../registrar';</script>";
					exit;
				}
			}else{
				echo"<script language='javascript' type='text/javascript'>alert('Cpf Invalido');window.location.href='../registrar';</script>";
			}
		}else{
			echo"<script language='javascript' type='text/javascript'>alert('Email já existente');window.location.href='../registrar';</script>";
		}

	}

	public function professorRegistrar(){
		$DAO = new GenericDAO();
		$professor = new Usuario();

		$professor->setNome($_POST['nome']);
		$professor->setEmail($_POST['email']);
		$professor->setCpf($_POST['cpf']);
		$professor->setUf($_POST['uf']);
		$professor->setCidade($_POST['cidade']);
		$professor->setTelefone($_POST['telefone']);
		$professor->setDatanasc($_POST['date']);
		$professor->setEndereco($_POST['endereco']);
		$professor->setDescricao($_POST['descricao']);
		$professor->setSenha($_POST['senha']);
		$confirmarSenha = $_POST['confirmarSenha'];
		$professor->setImagem($_FILES['imagem']);
		$imagem = $usuario->getImagem();		

		if($this->verificaEmail('professor', $usuario->getEmail()) == true){
			if($this->verificaCpf($usuario->getCpf()) == true){
				if($usuario->getSenha() == $confirmarSenha){
					if(isset($imagem['tmp_name']) && !empty($imagem['tmp_name'])){
						$extensao = substr($_FILES['imagem']['name'], -4);
						print_r(move_uploaded_file($imagem['tmp_name'], '../ProjetoFlexbox/controle/arquivos/'.md5($usuario->getCpf()).$extensao));

						$DAO->insert("usuario", array(
							"nome" => $usuario->getNome(),
							"email" => $usuario->getEmail(),
							"telefone" => $usuario->getTelefone(),
							"cpf" => $usuario->getCpf(),
							"datanasc" => $usuario->getDatanasc(),
							"adm" => '0',
							"cidade" => $usuario->getCidade(),
							"endereco" => $usuario->getEndereco(),
							"descricao" => $usuario->getDescricao(),
							"imagem" => md5($usuario->getCpf()).$extensao,
							"senha" => $usuario->getSenha(),
							"uf" => $usuario->getUf()
						));
						echo"<script language='javascript' type='text/javascript'>alert('Registrado com sucesso');window.location.href='../logar';</script>";
						exit;
					}
				}else{
					echo"<script language='javascript' type='text/javascript'>alert('Dados não preenchidos ou senhas não identicas');window.location.href='../registrar';</script>";
					exit;
				}
			}else{
				echo"<script language='javascript' type='text/javascript'>alert('Cpf Invalido');window.location.href='../registrar';</script>";
			}
		}else{
			echo"<script language='javascript' type='text/javascript'>alert('Email já existente');window.location.href='../registrar';</script>";
		}
	}
}