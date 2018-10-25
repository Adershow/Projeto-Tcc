<?php
class Materia{

	private $id;
	private $nomes;
	private $descricao;

	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getNomes() {
		return $this->nomes;
	}

	public function setNomes($nomes) {
		$this->nomes = $nomes;
		return $this;
	}
	public function getDescricao() {
		return $this->descricao;
	}

	public function setDescricao($descricao) {
		$this->descricao = $descricao;
		return $this;
	}
}