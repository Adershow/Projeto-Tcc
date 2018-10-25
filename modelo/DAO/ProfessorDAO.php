<?php
require 'GenericDAO.php';
class ProfessorDAO extends GenericDAO{
	public function pagination($data = array(), $search = ''){

		$verificado = addslashes($search);
		$query = $this->query("SELECT p.id, p.nome, p.imagem, p.descricao FROM professor p  WHERE p.uf = '".$data['uf']."'  AND p.cidade = '".$data['cidade']."' AND UCASE(p.nome) LIKE '%".strtoupper($verificado)."'");
		return $query;
	}

	public function selectProfs($data = array(), $search = '', $mody = 0, $materia = ''){

		$verificado = addslashes($search);
		$query = $this->query("SELECT p.nome, p.id, p.descricao, p.imagem, GROUP_CONCAT(m.nomes) as nomes FROM professor p INNER JOIN professor_has_materias pm on pm.professor_id = p.id INNER JOIN materias m on m.id = pm.materias_id WHERE p.uf = '".$data['uf']."' AND p.cidade = '".$data['cidade']."' AND m.nomes LIKE '%".$materia."%' AND UCASE(p.nome) LIKE  '%".strtoupper($verificado)."%' GROUP BY p.id LIMIT 5 OFFSET ".$mody);
		return $query;
	}
}