<?php 
class aulasCtl extends controller
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
			$this->loadView('aulas');
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

	public function listarAulas()
	{
		session_start();
		if (isset($_SESSION['searchAula'])) {
			$_SESSION['searchAula'] = '';
		}

		$DAO = new AulasDAO();
		$aulasSelect = new AulasDAO();
		$materias = new AulasDAO();

		$aulasSelect->selectAulas($_SESSION['id']);
		$DAO->query("SELECT * FROM usuario");

		$_SESSION['alunosList'] = $DAO->result();
		$teste = $aulasSelect->result();

		foreach ($teste as $testes) {
			$dt = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
			$dataAtual = $dt->format('Y-m-d h:i:s');
			$dataFinal = $testes['dataFinal'];

			if (strtotime($dataFinal) < strtotime($dataAtual)) {
				$DAO->query("DELETE FROM usuario_has_aulas WHERE aulas_id = '" . $testes['id'] . "'");
				$DAO->query("DELETE FROM aulas_has_materias WHERE aula_id = '" . $testes['id'] . "'");
				$DAO->query("DELETE FROM aulas WHERE id = '" . $testes['id'] . "'");
			}
		}

		if ((isset($_POST['search'])) && ($_SESSION['tipo'] == "professor")) {

			$search = $_POST['search'];
			$_SESSION['searchAula'] = $search;
			$materias->selectMaterias($_SESSION['id']);
			$aulasSelect->selectAulas($_SESSION['id'], $search);

		} elseif ($_SESSION['tipo'] == "professor") {

			$materias->selectMaterias($_SESSION['id']);
			$aulasSelect->selectAulas($_SESSION['id']);

		}
		if ((isset($_POST['search'])) && ($_SESSION['tipo'] == "usuario")) {

			$search = $_POST['search'];
			$_SESSION['searchAula'] = $search;
			$aulasSelect->selectAulas($_SESSION['id'], $search);

		} elseif ($_SESSION['tipo'] == "usuario") {

			$aulasSelect->selectAulas($_SESSION['id']);
		}

		$_SESSION['materiasAula'] = $materias->result();
		$aulasSelect->result();
		$count = $aulasSelect->numRows();
		$_SESSION['dadosAula'] = $aulasSelect->result();
		$_SESSION['numero'] = ceil(($count / 100) * 5);
		header("location: ../aulas");
	}

	public function inserirAula()
	{
		session_start();
		$DAO = new AulasDAO();
		$aulas = new Aulas();

		$aulas->setNome($_POST['nome']);
		$aulas->setDescricao($_POST['descricao']);
		$aulas->setDataInicial($_POST['dataInicial']);
		$aulas->setDataFinal($_POST['dataFinal']);
		$professor_id = $_SESSION['id'];
		$aulas->setProfessor_id($professor_id);

		if ($this->checkDate($aulas->getDataInicial(), $aulas->getDataFinal()) == false) {
			$DAO->insert('aulas', array(
				'nomeAula' => $aulas->getNome(),
				'descricao' => $aulas->getDescricao(),
				'data' => $aulas->getDataInicial(),
				'dataFinal' => $aulas->getDataFinal(),
				'professor_id' => $aulas->getProfessor_id()
			));

			$DAO->query('SELECT LAST_INSERT_ID()');
			$last_id = $DAO->result();
			foreach ($last_id as $dado) {
				foreach ($_POST['materias'] as $materias) {
					echo $materias;
					echo $dado['LAST_INSERT_ID()'];
					$DAO->insert('aulas_has_materias', array('materia_id' => $materias, 'aula_id' => $dado['LAST_INSERT_ID()']));
				}

				foreach ($_POST['usuario'] as $usuario) {
					$DAO->insert('usuario_has_aulas', array('usuario_id' => $usuario, 'aulas_id' => $dado['LAST_INSERT_ID()']));
				}
			}
			header("location: ../aulas/listarAulas");

		} else {
			echo "<script language='javascript' type='text/javascript'>alert('A data final é maior que a inicial');window.location.href='../aulas/listarAulas';</script>";
		}
	}
}