<?php
class logarCtl extends controller{
	private $DAO;

	public function index(){
		$this->loadView('login');
	}
	public function login(){
		session_start();
		require '../ProjetoFlexbox/modelo/DAO/GenericDAO.php';
		require '../ProjetoFlexbox/modelo/Usuario.php';
		$login = $_POST["nome"];
		$senha = $_POST["senha"];
		$tipo = $_POST["tipo"];
		if(isset($tipo)){
			$_SESSION['tipo'] = $tipo;
			$_SESSION['tipoUper'] = ucfirst($_SESSION['tipo']);
			$DAO = new GenericDAO();
			$DAO->query("SELECT * FROM ".$tipo." WHERE email = '".$login."' AND senha = '".$senha."'");
			
			if (sizeof($DAO->result()) > 0) {
				$_SESSION['email'] = $login;
				$_SESSION['senha'] = $senha;

				foreach ($DAO->result() as $usu) {
					if ($usu['adm'] == 1) {
						header('location:../AreaAdministrativa');
						$_SESSION['id'] = $usu['id'];
						$_SESSION['imagem'] = $usu['imagem'];
						$_SESSION['login'] = $usu['nome'];
						$_SESSION['email'] = $usu['email'];
						$_SESSION['cidade'] = $usu['cidade'];
						$_SESSION['cpf'] = $usu['cpf'];
						$_SESSION['endereco'] = $usu['endereco'];
						$_SESSION['uf'] = $usu['uf'];
					}else{
						header('location:../');
						$_SESSION['id'] = $usu['id'];
						$_SESSION['imagem'] = $usu['imagem'];
						$_SESSION['login'] = $usu['nome'];
						$_SESSION['email'] = $usu['email'];
						$_SESSION['cidade'] = $usu['cidade'];
						$_SESSION['cpf'] = $usu['cpf'];
						$_SESSION['endereco'] = $usu['endereco'];
						$_SESSION['uf'] = $usu['uf'];
					}
				}
			}else{
				unset ($_SESSION['login']);
				unset ($_SESSION['senha']);
				echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='../logar';</script>";
				exit();
			}
		}else{
			header("location: ../logar");
		}
	}
	public function deslogar(){
		session_start();
		session_destroy();
		header("location: ../");
	}
}