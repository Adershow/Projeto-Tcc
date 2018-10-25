<?php
class Aulas{
	private $id;
	private $nome;
	private $descricao;
	private $dataInicial;
	private $dataFinal;
	private $professor_id;

	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
		return $this;
	}
	public function getDescricao() {
		return $this->descricao;
	}

	public function setDescricao($descricao) {
		$this->descricao = $descricao;
		return $this;
	}
	public function getDataInicial() {
		return $this->dataInicial;
	}

	public function setDataInicial($dataInicial) {
		$this->dataInicial = $dataInicial;
		return $this;
	}
	public function getDataFinal() {
		return $this->dataFinal;
	}

	public function setDataFinal($dataFinal) {
		$this->dataFinal = $dataFinal;
		return $this;
	}
	public function getProfessor_id() {
		return $this->professor_id;
	}

	public function setProfessor_id($professor_id) {
		$this->professor_id = $professor_id;
		return $this;
	}



}