<?php
class Usuario{

	private $id;
	private $endereco;
	private $telefone;
	private $email;
	private $cpf;
	private $nome;
	private $uf;
	private $cidade;
	private $imagem;
	private $imagem1;
	private $senha;

	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}

	public function getCpf() {
		return $this->cpf;
	}

	public function setCpf($cpf) {
		$this->cpf = $cpf;
		return $this;
	}
	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
		return $this;
	}

	public function getUf() {
		return $this->uf;
	}

	public function setUf($uf) {
		$this->uf = $uf;
		return $this;
	}
	public function getCidade() {
		return $this->cidade;
	}

	public function setCidade($cidade) {
		$this->cidade = $cidade;
		return $this;
	}
	public function getImagem() {
		return $this->imagem;
	}

	public function setImagem($imagem) {
		$this->imagem = $imagem;
		return $this;
	}
	public function getImagem1() {
		return $this->imagem1;
	}

	public function setImagem1($imagem1) {
		$this->imagem1 = $imagem1;
		return $this;
	}
	public function getSenha() {
		return $this->senha;
	}

	public function setSenha($senha) {
		$this->senha = $senha;
		return $this;
	}
}