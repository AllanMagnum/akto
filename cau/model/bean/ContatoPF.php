<?php
class ContatoPF implements JsonSerializable{
	private $id;
	private $o_tipoContato;
	private $o_operadoraContato;
	private $contato;
	private $o_pessoa;
	private $dataCadastro;
	private $dataAtualizacao; 
	
	public function __construct($id="", $o_tipoContato="", $o_operadoraContato ="", $contato="", $o_pessoa="", $dataCadastro="", $dataAtualizacao=""){
		$this->id= $id;
		$this->o_tipoContato = $o_tipoContato ;
		$this->o_operadoraContato = $o_operadoraContato;
		$this->contato = $contato;
		$this->o_pessoa = $o_pessoa;
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
	public function setOTipocontato($o_tipoContato) {
		$this->o_tipoContato = $o_tipoContato;
	}
	public function getOOperadoracontato() {
		return $this->o_operadoraContato;
	}
	public function setOOperadoracontato($o_operadoraContato) {
		$this->o_operadoraContato = $o_operadoraContato;
	}
	public function getContato() {
		return $this->contato;
	}
	public function setContato($contato) {
		$this->contato = $contato;
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