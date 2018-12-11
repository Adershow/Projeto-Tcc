<?php 
require '../ProjetoFlexbox/modelo/DAO/GenericDAO.php';
require '../ProjetoFlexbox/modelo/Professor.php';
require '../ProjetoFlexbox/modelo/Usuario.php';
class minhacontaCtl extends controller{
	
	public function index(){
		session_start();
		if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
			
			echo "ERRO";
			header("location: logar");
		}else{
			$logado = $_SESSION['login'];
			$this->loadView('minhaconta');
		}	
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
		
		$DAO->query("SELECT * FROM ".$tipo." WHERE email = '".$email."' AND id !='".$_SESSION['id']."'"); 

		if(sizeof($DAO->result()) == 0){
			return true;
		}else{
			return false;
		}
	}

	public function listarDados(){
		session_start();
		$DAO = new GenericDAO();
		$DAO->query("SELECT * FROM ".$_SESSION['tipo']." WHERE ".$_SESSION['tipo'].".id ='".$_SESSION['id']."'");
		$_SESSION['dados'] = $DAO->result();
		header("location: ../minhaconta");
	}
	
	/*public function imagem(){
		$arquivo = $_FILES['imagemPerfil'];
		if(move_uploaded_file($arquivo['tmp_name'], '../ProjetoFlexbox/controle/arquivos/'.$arquivo)){
			echo 'Imagem enviada com sucesso';
		}else{
			echo 'Erro';
		}
	}*/

	public function update(){
		session_start();
		$DAO = new GenericDAO();
		$usuario = new Usuario();
		$professor = new Professor();

		if($_SESSION['tipo'] == 'professor'){
			$professor->setId($_POST['id']);
			$professor->setNome($_POST['nome']);
			$professor->setEmail($_POST['email']);
			$professor->setUf($_POST['uf']);
			$professor->setCidade($_POST['cidade']);
			
			if($_POST['foto'] != ''){
				$usuario->setImagem1($_POST['foto']);
				$imagem = $usuario->getImagem1();
				$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagem));
				file_put_contents('../ProjetoFlexbox/controle/arquivos/Professor_'.$_SESSION['cpf'].'/'.$_SESSION['cpf'].'.png', $data); 
			}


			if($this->verificaEmail('professor' ,$professor->getEmail()) == true){
				
				

				$DAO->query("UPDATE professor SET nome ='".$professor->getNome()."', email ='".$professor->getEmail()."', uf='".$professor->getUf()."', cidade='".$professor->getCidade()."', imagem1='".$_SESSION['cpf'].'.png'."' WHERE id='".$professor->getId()."'");
				$DAO->query("SELECT * FROM professor WHERE id='".$professor->getId()."'");
				foreach ($DAO->result() as $usu) {
					$_SESSION['id'] = $usu['id'];
					$_SESSION['login'] = $usu['nome'];
					$_SESSION['email'] = $usu['email'];
					$_SESSION['cidade'] = $usu['cidade'];
					$_SESSION['uf'] = $usu['uf'];
					$_SESSION['imagem1'] = $usu['imagem1'];
				}

				$this->listarDados();
			}else{
				echo"<script language='javascript' type='text/javascript'>alert('Email já existente');window.location.href='../minhaconta';</script>";
				exit;
			}
		}else{

			$usuario->setId($_POST['id']);
			$usuario->setNome($_POST['nome']);
			$usuario->setEmail($_POST['email']);
			$usuario->setUf($_POST['uf']);
			$usuario->setCidade($_POST['cidade']);
			if($_POST['foto'] != ''){
				$usuario->setImagem1($_POST['foto']);
				$imagem = $usuario->getImagem1();

				$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagem));
				file_put_contents('../ProjetoFlexbox/controle/arquivos/Usuario_'.$_SESSION['cpf'].'/'.$_SESSION['cpf'].'.png', $data); 
			}

			if($this->verificaEmail('usuario' ,$usuario->getEmail()) == true){

				$DAO->query("UPDATE usuario SET nome ='".$usuario->getNome()."', email ='".$usuario->getEmail()."', uf='".$usuario->getUf()."', cidade='".$usuario->getCidade()."', imagem1 = '".$_SESSION['cpf'].'.png'."' WHERE id='".$usuario->getId()."'");
				$DAO->query("SELECT * FROM usuario WHERE id='".$usuario->getId()."'");

				foreach ($DAO->result() as $usu) {
					$_SESSION['id'] = $usu['id'];
					$_SESSION['login'] = $usu['nome'];
					$_SESSION['email'] = $usu['email'];
					$_SESSION['cidade'] = $usu['cidade'];
					$_SESSION['uf'] = $usu['uf'];
					$_SESSION['imagem1'] = $usu['imagem1'];
				}
				$this->listarDados();
			}else{
				echo"<script language='javascript' type='text/javascript'>alert('Email já existente');window.location.href='../minhaconta';</script>";
				exit;
			}

		}

	}
}