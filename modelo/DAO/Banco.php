<?php
class Banco{
	protected $pdo;
	protected $numRows;
	protected $array;

	public function __construct($host = "localhost", $dbname = "tcc", $dbuser = "root", $dbpass = ""){
		try {

			$this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host.";charset=utf8", $dbuser, $dbpass);

		} catch (PDOException $e) {

			echo "Falhou:".$e->getMessage();
		}
	}


}
