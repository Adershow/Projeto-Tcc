<?php 
require '../modelo/DAO/ProfessorDAO.php';
class professorCtl
{

	public function listar()
	{

		$DAO = new ProfessorDAO();
		$DAO->query("SELECT * FROM professor_has_materias p INNER JOIN materias m on p.materias_id = m.id INNER JOIN professor pr on p.professor_id = pr.id");
		foreach ($DAO->result() as $usu) {

			$date = date("d/m/Y", strtotime($usu['datanasc']));
			echo "<tr><th><img src ='../controle/arquivos/" . $usu['imagem'] . "' height='50px' width='50px'/></th>
			<th>" . $usu['id'] . "</th>
			<th>" . $usu['nome'] . "</th>
			<th>" . $usu['email'] . "</th>
			<th>" . $usu['endereco'] . "</th>
			<th>" . $usu['cpf'] . "</th>
			<th>" . $usu['telefone'] . "</th>
			<th>" . $date . "</th>
			<th>" . $usu['nomes'] . "</th>
			<th><a href=" . "../controle/professorCtl.php?id=" . $usu['id'] . "><button class='btn btn-danger'>Excluir</button></a></th></tr>";
		}
	}
	public function delete()
	{
		$DAO = new ProfessorDAO();
		$id = $_GET['id'];
		$DAO->remover($id);
		header('location:../AreaAdministrativa/professor.php');
		exit;
	}
}
if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['id']) {
	$professor = new professorCtl();
	$professor->delete();
}
