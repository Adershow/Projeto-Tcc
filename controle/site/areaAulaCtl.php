<?php 
class areaAulaCtl extends controller
{
    public function __construct()
	{
		$this->loadDAO('AulasDAO');
		$this->loadModel('Aulas');
	}

	public function index()
	{
        session_start();
		if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {

			echo "ERRO";
			header("location: logar");
		} else {
			$logado = $_SESSION['login'];
			$this->loadView('areaAula');
		}
	}
	
	public function checkDate($dataInicial, $dataFinal)
	{
		if (strtotime($dataInicial) > strtotime($dataFinal)) {
			return true;
		} else {
			return false;
		}
	}

    public function listarDados(){
		session_start();
		$DAO = new AulasDAO();
		$DAO2 = new AulasDAO();
		$aulasSelect = new AulasDAO();
		$materias = new AulasDAO();

		$id = $_POST['id'];
        $materias->selectMaterias($_SESSION['id']);
		$aulasSelect->selectAulas($_SESSION['id'], '', $id);
		$_SESSION['materiasAreaAula'] = $materias->result();
		$_SESSION['selectAulas'] = $aulasSelect->result();
		$DAO->query("SELECT distinct u.id ,u.nome as nomeUsuario, p.nome as nomeProfessor, u.imagem as imagemAl, p.imagem FROM aulas a LEFT OUTER JOIN usuario_has_aulas ua on ua.aulas_id = a.id INNER JOIN usuario u on u.id = ua.usuario_id INNER JOIN professor p on p.id = a.professor_id  WHERE a.id = '".$id."'");
		$DAO2->query("SELECT p.nome as nomeProfessor, p.imagem FROM aulas a INNER JOIN professor p on p.id = a.professor_id  WHERE a.id = '".$id."'");
		$_SESSION['dadosAreaAulaProf'] = $DAO2->result();
		$_SESSION['dadosAreaAulaUsu'] = $DAO->result();
		header("location: ../areaAula");
		
	}
	
	public function update(){
		session_start();
		$DAO = new AulasDAO();
		$aula = new Aulas();

		$aula->setNome($_POST['nome']);
		$aula->setDataInicial($_POST['dataInicial']);
		$aula->setDataFinal($_POST['dataFinal']);
		$aula->setDescricao($_POST['descricao']);
		$aula->setId($_POST['id']);

		if ($this->checkDate($aula->getDataInicial(), $aula->getDataFinal()) == false) {
			$DAO->query("UPDATE aulas SET nomeAula ='".$aula->getNome()."', data ='".$aula->getDataInicial()."', dataFinal='".$aula->getDataFinal()."', descricao='".$aula->getDescricao()."'  WHERE id='".$aula->getId()."'");
			echo"<script language='javascript' type='text/javascript'>alert('Alterado com sucesso');window.location.href='../aulas/listarAulas';</script>";
			exit;
		}else{
			echo "<script language='javascript' type='text/javascript'>alert('A data final é maior que a inicial');window.location.href='../aulas/listarAulas';</script>";
		}

	}
}