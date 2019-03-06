<?php
require_once 'vendor/autoload.php';
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
		$_SESSION['roomIntern'] = '';
		$_SESSION['salaNome'] = '';
		$DAO = new GenericDAO();
		$id = $_POST['id'];
		$DAO->query("SELECT * FROM professor p WHERE p.id = '".$id."'");
		$_SESSION['dados'] = $DAO->result();

		$chatkit = new Chatkit\Chatkit([
			'instance_locator' => 'v1:us1:af3aa747-66bc-4b25-93d7-bbb125df0f20',
			'key' => 'd28b4e1f-0e5e-4c0b-8c1c-dab59e586991:OHHgQIVrt7Ies4Um/q4IE4RasZgyoCxFLNrXl9NAQjA=',
		]);

		if ($_SESSION['tipo'] == 'professor') {
			$_SESSION['idAlt'] = 'Pr.' . $_SESSION['id'];
		} else {
			$_SESSION['idAlt'] = $_SESSION['id'];
		}
		foreach($chatkit->getUserRooms(['id' => $_SESSION['idAlt']])['body'] as $room){
			
			if($room['name'] == $_SESSION['id'].'.e.'.$id){
				echo 'entrou';
				$_SESSION['salaNome'] = true;
				$_SESSION['roomIntern'] = $chatkit->getRoom([ 'id' => $room['id']])['body'];
				break;
			}

		}
		if($_SESSION['salaNome'] == ''){
			echo 'Esta aqui';
			if($_SESSION['tipoUper'] == 'Professor'){
				$chatkit->createRoom([
					'creator_id' => 'Pr.'.$id,
					'name' => $_SESSION['id'].'.e.'.$id,
					'user_ids' => ['Pr.'.$_SESSION['id'], 'Pr'.$id],
					'private' => true,
				]);
				foreach($chatkit->getUserRooms(['id' => $_SESSION['idAlt']])['body'] as $room){
					if($room['name'] == $_SESSION['id'].'.e.'.$id){
						$_SESSION['roomIntern'] = $chatkit->getRoom([ 'id' => $room['id']])['body'];
					}
				}
			}else{
				$chatkit->createRoom([
					'creator_id' => 'Pr.'.$id,
					'name' => $_SESSION['id'].'.e.'.$id,
					'user_ids' => [$_SESSION['id'], 'Pr.'.$id],
					'private' => true,
				]);
				foreach($chatkit->getUserRooms(['id' => $_SESSION['idAlt']])['body'] as $room){
					if($room['name'] == $_SESSION['id'].'.e.'.$id){
						$_SESSION['roomIntern'] = $chatkit->getRoom([ 'id' => $room['id']])['body'];
					}
				}
			}
		}
		header("location: ../areaProfessor");
		
	}
}