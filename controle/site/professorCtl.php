<?php
class professorCtl extends controller{
	
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
			$DAO = new GenericDAO();
			$DAO->query("SELECT * FROM materias");
			$_SESSION['materias'] = $DAO->result(); 
			$this->loadView('professor');
		}	
	}

	public function listarProfessores(){
		session_start();
		if(isset($_SESSION['search'])){
			$_SESSION['search'] = '';
		}
		
		$pagination = new ProfessorDAO();
		$selectProfs = new ProfessorDAO();
		
		if (isset($_POST['search'])) {
			$search = $_POST['search'];
			$_SESSION['search'] = $search;
			$pagination->pagination(array('uf' => $_SESSION['uf'], 'cidade' => $_SESSION['cidade']), $search);
			$selectProfs->selectProfs(array('uf' => $_SESSION['uf'], 'cidade' => $_SESSION['cidade']), $search);
		}else{
			$pagination->pagination(array('uf' => $_SESSION['uf'], 'cidade' => $_SESSION['cidade']));
			$selectProfs->selectProfs(array('uf' => $_SESSION['uf'], 'cidade' => $_SESSION['cidade']));
		}

		$pagination->result();
		$count = $pagination->numRows();
		$_SESSION['professores'] = $selectProfs->result();
		$_SESSION['numero'] = ceil(($count/100)*20);
		header("location: ../professor");
	}

	public function limite(){
		session_start();
		$selectProfs = new ProfessorDAO();
		$url = $_POST['page'];
		$mody = ($url*5)-5;
		if ($_SESSION['search'] != '' ){
			$selectProfs->selectProfs(array('uf' => $_SESSION['uf'], 'cidade' => $_SESSION['cidade']), $search, $mody);
		}else{
			$selectProfs->selectProfs(array('uf' => $_SESSION['uf'], 'cidade' => $_SESSION['cidade']), $search='', $mody);
		}

		$_SESSION['professores'] = $selectProfs->result();
		$_SESSION['paginaAtual'] = $url;
		header("location: ../professor");
	}

	public function estrelas(){
		session_start();
		$DAO = new GenericDAO();
		$professor = new Professor();
		$avaliacao = $_POST['valor'];
		$professor = $_POST['professor'];


		$DAO->query("SELECT * FROM aulas a INNER JOIN usuario_has_aulas ua on ua.aulas_id = a.id INNER JOIN usuario u on u.id = ua.usuario_id INNER JOIN professor p on p.id = a.professor_id WHERE u.id = '".$_SESSION['id']."'");
		if(count($DAO->result()) != 0){
			$DAO->insert('avaliacao', array(
				'numero' => $avaliacao,
				'usuario_id' => $_SESSION['id']
			));
			$DAO->query('SELECT LAST_INSERT_ID()');
			$last_id = $DAO->result();
			foreach ($last_id as $dado) {
				$DAO->insert('professor_has_avaliacao', array(
					'professor_id' => $professor,
					'avaliacao_id' => $dado['LAST_INSERT_ID()']
				));
			}
		}
		header("location: ../professor");
	}


	public function previewNext(){
		session_start();
		$selectProfs = new ProfessorDAO();
		while($i < $_SESSION['numero']){
			$i++;
		}
		
		if(isset($_POST['next']) && $_POST['next'] <= $i){

			$url = $_POST['next'];
			$mody = ($url*5)-5;
			
			if ($_SESSION['search'] != ''){
				$selectProfs->selectProfs(array('uf' => $_SESSION['uf'], 'cidade' => $_SESSION['cidade']), $search, $mody);
			}else{
				$selectProfs->selectProfs(array('uf' => $_SESSION['uf'], 'cidade' => $_SESSION['cidade']), $search='', $mody);
			}
			
			$_SESSION['professores'] = $selectProfs->result();
			$_SESSION['paginaAtual'] = $url;
			header("location: ../professor");

		}else{
			header("location: ../professor");
		}
		if (isset($_POST['preview']) && $_POST['preview'] > 0) {

			$url = $_POST['preview'];
			$mody = ($url*5)-5;
			if ($_SESSION['search'] != ''){
				$selectProfs->selectProfs(array('uf' => $_SESSION['uf'], 'cidade' => $_SESSION['cidade']), $search, $mody);
			}else{
				$selectProfs->selectProfs(array('uf' => $_SESSION['uf'], 'cidade' => $_SESSION['cidade']), $search='', $mody);
			}
			$_SESSION['professores'] = $selectProfs->result();
			$_SESSION['paginaAtual'] = $url;
		}else{
			header("location: ../professor");
		}
	}

	public function filtro(){
		session_start();
		$materia = $_POST['selecionarMateria'];
		$pagination = new ProfessorDAO();
		$selectProfs = new ProfessorDAO();

		$pagination->pagination(array('uf' => $_SESSION['uf'], 'cidade' => $_SESSION['cidade']));
		$selectProfs->selectProfs(array('uf'=>$_SESSION['uf'], 'cidade'=>$_SESSION['cidade']), $search='', $mody=0, $materia);

		$pagination->result();
		$count = $pagination->numRows();
		$_SESSION['professores'] = $selectProfs->result();
		$_SESSION['numero'] = ceil(($count/100)*20);
		header("location: ../professor");
	}
}