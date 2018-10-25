<?php
class Usuario{

	private $id;
	private $endereco;
	private $telefone;
	private $email;
	private $cpf;
	private $nome;
	private $datanasc;
	private $uf;
	private $cep;
	private $cidade;
	private $imagem;
	private $senha;

	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	public function getEndereco() {
		return $this->endereco;
	}

	public function setEndereco($endereco) {
		$this->endereco = $endereco;
		return $this;
	}
	public function getTelefone() {
		return $this->telefone;
	}

	public function setTelefone($telefone) {
		$this->telefone = $telefone;
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
	public function getDatanasc() {
		return $this->datanasc;
	}

	public function setDatanasc($datanasc) {
		$this->datanasc = $datanasc;
		return $this;
	}

	public function getUf() {
		return $this->uf;
	}

	public function setUf($uf) {
		$this->uf = $uf;
		return $this;
	}
	public function getCep() {
		return $this->cep;
	}

	public function setCep($cep) {
		$this->cep = $cep;
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
	public function getSenha() {
		return $this->senha;
	}

	public function setSenha($senha) {
		$this->senha = $senha;
		return $this;
	}
}