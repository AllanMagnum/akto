<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/TipoContato.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/OperadoraContato.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/PessoaFisica.php';

class ContatoPF implements JsonSerializable{
	private $id;
	private $o_tipoContato;
	private $o_operadoraContato;
	private $contato;
	private $o_pessoaFisica;
	private $dataCadastro;
	private $dataAtualizacao; 
	
	public function __construct($id=null, TipoContato $o_tipoContato=null, OperadoraContato $o_operadoraContato =null, $contato=null, PessoaFisica $o_pessoaFisica=null, $dataCadastro=null, $dataAtualizacao=null){
		$this->id= $id;
		$this->o_tipoContato = $o_tipoContato ;
		$this->o_operadoraContato = $o_operadoraContato;
		$this->contato = $contato;
		$this->o_pessoaFisica = $o_pessoaFisica;
		$this->dataCadastro = $dataCadastro;
		$this->dataAtualizacao = $dataAtualizacao;
	}
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getOTipocontato() {
		return $this->o_tipoContato;
	}
	public function setOTipocontato(TipoContato $o_tipoContato) {
		$this->o_tipoContato = $o_tipoContato;
	}
	public function getOOperadoracontato() {
		return $this->o_operadoraContato;
	}
	public function setOOperadoracontato(OperadoraContato $o_operadoraContato) {
		$this->o_operadoraContato = $o_operadoraContato;
	}
	public function getContato() {
		return $this->contato;
	}
	public function setContato($contato) {
		$this->contato = $contato;
	}
	public function getOPessoaFisica() {
		return $this->o_pessoaFisica;
	}
	public function setOPessoaFisica(PessoaFisica $o_pessoaFisica) {
		$this->o_pessoaFisica = $o_pessoaFisica;
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
		return "Contato [ id= " . $this->id . ", tipo contato= " . $this->o_tipoContato . ", operadora= " .$this->o_operadoraContato . ", contato= " . $this->contato . ", data de cadastro= " . $this->dataCadastro . ", data de atualizacao= " . $this->dataAtualizacao . "]"	;
	}
	
	public function jsonSerialize() {
		return [
					'id' => $this->id,
					'o_tipoContato' => $this->o_tipoContato->jsonSerialize(),
					'o_operadoraContato' => $this->o_operadoraContato->jsonSerialize(),
					'contato' => $this->contato,
					'o_pessoa' => $this->o_pessoa->jsonSerialize(),
					'dataCadastro' => $this->dataCadastro,
					'dataAtualizacao' => $this->dataAtualizacao
				];
	}

}
?>