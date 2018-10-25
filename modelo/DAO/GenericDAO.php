<?php
require_once 'Banco.php';
class GenericDAO extends Banco{

	public function query($sql){
		$query = $this->pdo->query($sql);
		$this->numRows = $query->rowCount();
		$this->array = $query->fetchAll();
	}

	public function result(){
		return $this->array;
	}
	public function numRows(){
		return $this->numRows;
	}

	public function insert($table, $data){
		if(!empty($table) && ( is_array($data) && count($data) > 0)){

			$sql = "INSERT INTO ".$table." SET ";
			$dados = array();
			foreach ($data as $key => $value) {
				$dados[] = $key." = '".addslashes($value)."'";
			}
			$sql = $sql.implode(", ", $dados);
			$this->pdo->query($sql);
		}
	}

	public function update($table, $data, $where = array(), $where_cond = "AND"){
		if(!empty($table) && ( is_array($data) && count($data) > 0) && is_array($where)){
			$sql = "UPDATE ".$table." SET ";
			$dados = array();
			foreach ($data as $key => $valor) {
				$dados[] = $key." = '".addslashes($valor)."'";
			}
			$sql = $sql.implode(", ", $dados);

			if(count($where) > 0){
				$dados = array();
				foreach ($where as $key => $valor) {
					$dados[] = $key." = '".addslashes($valor)."'";
				}
				$sql = $sql." WHERE ".implode(" ".$where_cond." ", $dados);
			}
			$this->pdo->query($sql);
		}
	}

	public function remove($table, $data){
		$sql = "DELETE FROM ".$table." WHERE id='".$data."'";
		$this->pdo->query($sql);
	}
}