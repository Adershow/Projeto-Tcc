<?php
require 'GenericDAO.php';
class AulasDAO extends GenericDAO{
	
	public function selectMaterias($idProfessor){

		$query = $this->query("SELECT m.id, m.nomes FROM professor_has_materias pm INNER JOIN materias m on m.id = pm.materias_id INNER JOIN professor p on p.id = '".$idProfessor."' GROUP BY m.id"); 
		return $query;
	}

	public function selectAulas($idProfessor, $search = '', $idAula = ''){

		$verificado = addslashes($search);
		if($idAula == ''){
			if($_SESSION['tipo'] == 'usuario'){
				$query = $this->query("SELECT a.id as idAula, a.nomeAula, a.descricao, a.professor_id, a.data, a.dataFinal, GROUP_CONCAT(u.nome) as usuarioNome,u.imagem1 as imagemUsu, GROUP_CONCAT(p.nome), p.imagem1 as professorNome FROM aulas a INNER JOIN usuario_has_aulas ua on a.id = ua.aulas_id INNER JOIN usuario u on u.id = ua.usuario_id INNER JOIN professor p on p.id = a.professor_id WHERE u.id = '".$idProfessor."' AND UCASE(a.nomeAula) LIKE '%".strtoupper($verificado)."%' AND a.id != '".$idAula."' GROUP BY a.id LIMIT 20");
			}else{
				$query = $this->query("SELECT a.id as idAula, a.nomeAula, a.descricao, a.professor_id, a.data, a.dataFinal, GROUP_CONCAT(u.nome) as usuarioNome,u.imagem1 as imagemUsu, GROUP_CONCAT(p.nome), p.imagem1 as professorNome FROM aulas a INNER JOIN usuario_has_aulas ua on a.id = ua.aulas_id INNER JOIN usuario u on u.id = ua.usuario_id INNER JOIN professor p on p.id = a.professor_id WHERE p.id = '".$idProfessor."' AND UCASE(a.nomeAula) LIKE '%".strtoupper($verificado)."%' AND a.id != '".$idAula."' GROUP BY a.id LIMIT 20");
			}	
		}else{
			if($_SESSION['tipo'] == 'usuario'){
				$query = $this->query("SELECT a.id as idAula, a.nomeAula, a.descricao, a.professor_id, a.data, a.dataFinal, GROUP_CONCAT(u.nome) as usuarioNome,u.imagem1 as imagemUsu, GROUP_CONCAT(p.nome), p.imagem1 as professorNome FROM aulas a INNER JOIN usuario_has_aulas ua on a.id = ua.aulas_id INNER JOIN usuario u on u.id = ua.usuario_id INNER JOIN professor p on p.id = a.professor_id WHERE u.id = '".$idProfessor."' AND UCASE(a.nomeAula) LIKE '%".strtoupper($verificado)."%' AND a.id = '".$idAula."' GROUP BY a.id LIMIT 20");
			}else{
				$query = $this->query("SELECT a.id as idAula, a.nomeAula, a.descricao, a.professor_id, a.data, a.dataFinal, GROUP_CONCAT(u.nome) as usuarioNome,u.imagem1 as imagemUsu, GROUP_CONCAT(p.nome), p.imagem1 as professorNome FROM aulas a INNER JOIN usuario_has_aulas ua on a.id = ua.aulas_id INNER JOIN usuario u on u.id = ua.usuario_id INNER JOIN professor p on p.id = a.professor_id WHERE p.id = '".$idProfessor."' AND UCASE(a.nomeAula) LIKE '%".strtoupper($verificado)."%' AND a.id = '".$idAula."' GROUP BY a.id LIMIT 20");
			}
		}
		return $query;
	}
}