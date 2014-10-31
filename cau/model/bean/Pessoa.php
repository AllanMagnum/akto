<?php
class Pessoa {
	private $id;
	private $nome;
	private $telefoneMovel;
	private $telefoneFixo;
	private $telefoneAdicional;
	private $email;
	private $emailAdicional;
	private $logradouro;
	private $numero;
	private $complemento;
	private $bairro;
	private $cep;
	private $dataCadastro;
	private $dataAtualizacao;
	
	function __construct($id = "", $nome = "", $telefoneMovel = "", $telefoneFixo = "", $telefoneAdicional = "", $email = "", $emailAdicional = "", $logradouro = "", $numero = "", $complemento = "", $bairro = "", $cep = "", $dataCadastro = "", $dataAtualizacao = "") {
		$this->id = $id;
		$this->nome = $nome;
		$this->telefoneMovel = $telefoneMovel;
		$this->telefoneFixo = $telefoneFixo;
		$this->telefoneAdicional = $telefoneAdicional;
		$this->email = $email;
		$this->emailAdicional = $emailAdicional;
		$this->logradouro = $logradouro;
		$this->numero = $numero;
		$this->complemento = $complemento;
		$this->bairro = $bairro;
		$this->cep = $cep;
		$this->dataCadastro = $dataCadastro;
		$this->dataAtualizacao = $dataAtualizacao;
	}
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}
	function getNome() {
		return $this->nome;
	}
	function setNome($nome) {
		$this->nome = $nome;
	}
	function getTelefoneMovel() {
		return $this->telefoneMovel;
	}
	function setTelefoneMovel($telefoneMovel) {
		$this->telefoneMovel = $telefoneMovel;
	}
	function getTelefoneFixo() {
		return $this->telefoneFixo;
	}
	function setTelefoneFixo($telefoneFixo) {
		$this->telefoneFixo = $telefoneFixo;
	}
	function getTelefoneAdicional() {
		return $this->telefoneAdicional;
	}
	function setTelefoneAdicional($telefoneAdicional) {
		$this->telefoneAdicional = $telefoneAdicional;
	}
	function getEmail() {
		return $this->email;
	}
	function setEmail($email) {
		$this->email = $email;
	}
	function getEmailAdicional() {
		return $this->emailAdicional;
	}
	function setEmailAdicional($emailAdicional) {
		$this->emailAdicional = $emailAdicional;
	}
	function getLogradouro() {
		return $this->logradouro;
	}
	function setLogradouro($logradouro) {
		$this->logradouro = $logradouro;
	}
	function getNumero() {
		return $this->numero;
	}
	function setNumero($numero) {
		return $this->numero = $numero;
	}
	function getComplemento() {
		return $this->complemento;
	}
	function setComplemento($complemento) {
		$this->complemento = $complemento;
	}
	function getBairro() {
		return $this->bairro;
	}
	function setBairro($bairro) {
		$this->bairro = $bairro;
	}
	function getCep() {
		return $this->cep;
	}
	function setCep($cep) {
		$this->cep = $cep;
	}
	function getDataCadastro() {
		return $this->dataCadastro;
	}
	function setDataCadastro($dataCadastro) {
		$this->dataCadastro = $dataCadastro;
	}
	function getDataAtualizacao() {
		return $this->dataAtualizacao;
	}
	function setDataAtualizacao($dataAtualizacao) {
		$this->dataAtualizacao = $dataAtualizacao;
	}
	
	function __toString(){
		return "Pessoa [id=" . $this->id . ", nome=" . $this->nome . ", telefone movel=" . $this->telefoneMovel . ", telefone fixo=" . $this->telefoneFixo . ", telefone adicional=" . $this->telefoneAdicional . ", email=" . $this->email . ", email adicional=" . $this->emailAdicional . ", logradouro=" . $this->logradouro . ", numero=" . $this->numero . ", complemento=" . $this->complemento . ", bairro=" . $this->bairro . ", cep=" . $this->cep . ", data cadastro=" . $this->dataCadastro . ", data atualizacao=" . $this->dataAtualizacao . "]";
	}
}
?>