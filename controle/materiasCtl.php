<?php 
require '../modelo/DAO/GenericDAO.php';
class materiasCtl
{

	public function listar()
	{

		$DAO = new GenericDAO();
		$DAO->query("SELECT * FROM materias;");
		foreach ($DAO->result() as $usu) {

            $_SESSION['Mid'] = $usu['id'];
            $_SESSION['Mnome'] = $usu['nomes'];
            $_SESSION['Mdescricao'] = $usu['descricao'];

            echo "<tr><th>".$usu['id']."</th>
            <th>".$usu['nomes']."</th>
            <th>".$usu['descricao']."</th>
            <th><a href=" . "../controle/materiasCtl.php?id=" . $usu['id'] . "><button class='btn btn-danger'>Excluir</button></a><a href=" . "materiasAlterar.php" . "><button class='btn btn-success' value=".$usu['id'].">Alterar</button></a></th></tr>";
		}
	}
	public function delete()
	{
		$DAO = new GenericDAO();
		$id = $_GET['id'];
		$DAO->remove("materias", $id);
		header('location:../AreaAdministrativa/materias.php');
		exit;
    }
    
    public function alterar(){
        $DAO = new GenericDAO();
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $DAO->query("UPDATE `materias` SET `id`=".$id.",`nomes`=".$nome.",`descricao`=".$descricao." WHERE materias.id = '".$id."'");
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['id']) {
	$materia = new materiasCtl();
	$materia->delete();
}else if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['id']){
    $materia = new materiasCtl();
    $materia->alterar();
}
