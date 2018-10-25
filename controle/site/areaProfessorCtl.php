<?php
class areaProfessorCtl extends controller{
	public function __construct(){
		$this->loadDAO('ProfessorDAO');
	}

	public function index(){
		session_start();
		if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
			
			echo "ERRO";
			header("location: logar");
		}else{
			$logado = $_SESSION['login'];
			$this->loadView('areaProfessor');
		}	
	}

	public function listarDados(){
		session_start();
		$DAO = new GenericDAO();
		$id = $_POST['id'];
		$DAO->query("SELECT * FROM professor p WHERE p.id = '".$id."'");
		$_SESSION['dados'] = $DAO->result();
		header("location: ../areaProfessor");
	}
}