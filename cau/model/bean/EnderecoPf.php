<?php
class EnderencoPf implements JsonSerializable{
	private $id;
	private $o_tipoEndereco;
	private $logradouro;
	private $numero;
	private $complemento;
	private $bairro;
	private $cep;
	private $o_pessoaFisica;
	private $o_cidade;
	private $dataCadastro;
	private $dataAtualizacao;
	
	public function __construct($id="", $o_tipoEndereco = "", $logradouro="",  $numero="", $complemento="", $bairro="", $cep="", $o_pessoaFisica="",  $o_cidade="", $dataCadastro="", $dataAtualizacao=""){
		$this->id = $id;
		$this->o_tipoEndereco = $o_tipoEndereco;
		$this->logradouro = $logradouro;
		$this->numero = $numero;
		$this->complemento = $complemento;
		$this->bairro = $bairro;
		$this->cep = $cep;
		$this->o_pessoaFisica = $o_pessoaFisica;
		$this->o_cidade = $o_cidade;
		$this->dataCadastro = $dataCadastro;
		$this->dataAtualizacao = $dataAtualizacao;
	}
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function getOTipoEndereco() {
		return $this->o_tipoEndereco;
	}
	public function setOTipoEndereco($o_tipoEndereco) {
		$this->o_tipoEndereco = $o_tipoEndereco;
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
		$this->numero = $numero;
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
	public function getOPessoaFisica() {
		return $this->o_pessoaFisica;
	}
	public function setOPessoaFisica($o_pessoaFisica) {
		$this->o_pessoaFisica = $o_pessoaFisica;
	}
	public function getOCidade() {
		return $this->o_cidade;
	}
	public function setOCidade($o_cidade) {
		$this->o_cidade = $o_cidade;
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
		"Endereco [ id= " . $this->id . ", " . $this->o_tipoEndereco . ", logradouro= " . $this->logradouro . ", numero= " . $this->numero . ", complemento= " . $this->complemento . ", bairro= " . $this->bairro . "cep= " . $this->cep . ", " . $this->o_pessoaFisica . ", " . $this->o_cidade . ", data de cadastro= " . $this->dataCadastro . ", data de atualizacao= " . $this->dataAtualizacao . " ]";  	
	}
	
	public function jsonSerialize() {
		return array(
					'id' => $this->id,
					'o_tipoEndereco' => $this->o_tipoEndereco->jsonSerialize(),
					'logradouro' => $this->logradouro,
					'numero' => $this->numero,
					'complemento' => $this->complemento,
					'bairro' => $this->bairro,
					'cep' => $this->cep,
					'o_pessoaFisica' => $this->o_pessoaFisica->jsonSerialize(),
					'o_cidade' => $this->o_cidade->jsonSerialize(),
					'dataCadastro' => $this->dataCadastro,
					'dataAtualizacao' => $this->dataAtualizacao
				);

	}

}
?>