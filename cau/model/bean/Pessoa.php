<?php
class Pessoa {
	private  $id;
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
	public function getNome() {
		return $this->nome;
	}
	public function setNome($nome) {
		$this->nome = $nome;
	}
	public function getTelefoneMovel() {
		return $this->telefoneMovel;
	}
	public function setTelefoneMovel($telefoneMovel) {
		$this->telefoneMovel = $telefoneMovel;
	}
	public function getTelefoneFixo() {
		return $this->telefoneFixo;
	}
	public function setTelefoneFixo($telefoneFixo) {
		$this->telefoneFixo = $telefoneFixo;
	}
	public function getTelefoneAdicional() {
		return $this->telefoneAdicional;
	}
	public function setTelefoneAdicional($telefoneAdicional) {
		$this->telefoneAdicional = $telefoneAdicional;
	}
	public function getEmail() {
		return $this->email;
	}
	public function setEmail($email) {
		$this->email = $email;
	}
	public function getEmailAdicional() {
		return $this->emailAdicional;
	}
	public function setEmailAdicional($emailAdicional) {
		$this->emailAdicional = $emailAdicional;
	}
	public function getLogradouro() {
		return $this->logradouro;
	}
	public function setLogradouro($logradouro) {
		$this->logradouro = $logradouro;
	}
	public function getNumero() {
		return $this->numero;
	}
	public function setNumero($numero) {
		return $this->numero = $numero;
	}
	public function getComplemento() {
		return $this->complemento;
	}
	public function setComplemento($complemento) {
		$this->complemento = $complemento;
	}
	public function getBairro() {
		return $this->bairro;
	}
	public function setBairro($bairro) {
		$this->bairro = $bairro;
	}
	public function getCep() {
		return $this->cep;
	}
	public function setCep($cep) {
		$this->cep = $cep;
	}
	public function getDataCadastro() {
		return $this->dataCadastro;
	}
	public function setDataCadastro($dataCadastro) {
		$this->dataCadastro = $dataCadastro;
	}
	public function getDataAtualizacao() {
		return $this->dataAtualizacao;
	}
	public function setDataAtualizacao($dataAtualizacao) {
		$this->dataAtualizacao = $dataAtualizacao;
	}
	
	public function __toString(){
		return "Pessoa [id=" . $this->id . ", nome=" . $this->nome . ", telefone movel=" . $this->telefoneMovel . ", telefone fixo=" . $this->telefoneFixo . ", telefone adicional=" . $this->telefoneAdicional . ", email=" . $this->email . ", email adicional=" . $this->emailAdicional . ", logradouro=" . $this->logradouro . ", numero=" . $this->numero . ", complemento=" . $this->complemento . ", bairro=" . $this->bairro . ", cep=" . $this->cep . ", data cadastro=" . $this->dataCadastro . ", data atualizacao=" . $this->dataAtualizacao . "]";
	}
	public function toJson() {
		return $v_pessoa[] = array( 'id' => $this->id,
							 'nome' => $this->nome,
							 'telefoneMovel' => $this->telefoneMovel,
							 'telefoneFixo' => $this->telefoneFixo,
						     'telefoneAdicional' => $this->telefoneAdicional,
							 'email' => $this->email,
							 'emailAdicional' => $this->emailAdicional,
							 'logradouro' => $this->logradouro,
							 'numero' => $this->numero,
							 'complemento' => $this->complemento,
							 'bairro' => $this->bairro,
				             'cep' => $this->cep,
				             'dataCadastro' => $this->dataCadastro,
				             'dataAtualizacao' => $this->dataAtualizacao
		                    );
		
	}

}
?>