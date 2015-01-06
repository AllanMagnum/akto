<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/TipoEndereco.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/PessoaFisica.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Cidade.php';

class EnderecoPF implements JsonSerializable{
	private $id;
	private $tipoEndereco;
	private $logradouro;
	private $numero;
	private $complemento;
	private $bairro;
	private $cep;
	private $o_pessoaFisica;
	private $o_cidade;
	private $dataCadastro;
	private $dataAtualizacao;
	
	public function __construct($id=null, $tipoEndereco = null, $logradouro=null,  $numero=null, $complemento=null, $bairro=null, $cep=null, PessoaFisica $o_pessoaFisica=null,  Cidade $o_cidade=null, $dataCadastro=null, $dataAtualizacao=null){
		$this->id = $id;
		$this->tipoEndereco = $tipoEndereco;
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
	public function getTipoEndereco() {
		return $this->tipoEndereco;
	}
	public function setTipoEndereco($tipoEndereco) {
		$this->tipoEndereco = $tipoEndereco;
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
	public function setOPessoaFisica(PessoaFisica $o_pessoaFisica) {
		$this->o_pessoaFisica = $o_pessoaFisica;
	}
	public function getOCidade() {
		return $this->o_cidade;
	}
	public function setOCidade(Cidade $o_cidade) {
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
		return "EnderecoPF [ id= " . $this->id . ", tipo endereco =" . $this->tipoEndereco . ", logradouro= " . $this->logradouro . ", numero= " . $this->numero . ", complemento= " . $this->complemento . ", bairro= " . $this->bairro . ", cep=" . $this->cep . ", " . $this->o_pessoaFisica . ", " . $this->o_cidade . ", data de cadastro= " . $this->dataCadastro . ", data de atualizacao= " . $this->dataAtualizacao . " ]";  	
	}
	
	public function jsonSerialize() {
		return [
					'id' => $this->id,
					'tipoEndereco' => $this->tipoEndereco,
					'logradouro' => $this->logradouro,
					'numero' => $this->numero,
					'complemento' => $this->complemento,
					'bairro' => $this->bairro,
					'cep' => $this->cep,
// 					'o_pessoaFisica' => $this->o_pessoaFisica->jsonSerialize(),
// 					'o_cidade' => $this->o_cidade->jsonSerialize(),
					'dataCadastro' => $this->dataCadastro,
					'dataAtualizacao' => $this->dataAtualizacao
				];

	}

}
?>