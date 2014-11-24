<?php
class Enderenco implements JsonSerializable{
	private $id;
	private $tipoEnumEndereco;
	private $logradouro;
	private $numero;
	private $complemento;
	private $bairro;
	private $cep;
	private $o_pessoa;
	private $dataCadastro;
	private $dataAtualizacao;
	
	public function __construct($id="", $tipoEnumEndereco = "", $logradouro="",  $numero="", $complemento="", $bairro="", $cep="", $o_pessoa="", $dataCadastro="", $dataAtualizacao=""){
		$this->id = $id;
		$this->tipoEnumEndereco = $tipoEnumEndereco;
		$this->logradouro = $logradouro;
		$this->numero = $numero;
		$this->complemento = $complemento;
		$this->bairro = $bairro;
		$this->cep = $cep;
		$this->o_pessoa = $o_pessoa;
		$this->dataCadastro = $dataCadastro;
		$this->dataAtualizacao = $dataAtualizacao;
	}
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function getTipoEnumEndereco() {
		return $this->tipoEnumEndereco;
	}
	public function setTipoEnumEndereco($tipoEnumEndereco) {
		$this->tipoEnumEndereco = $tipoEnumEndereco;
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
	public function getOPessoa() {
		return $this->o_pessoa;
	}
	public function setOPessoa($o_pessoa) {
		$this->o_pessoa = $o_pessoa;
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
		
	}
	
	public function jsonSerialize() {
		return array(
					'id' => $this->id,
					'tipoEnumEndereco' => $this->tipoEnumEndereco,
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