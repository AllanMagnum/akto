<?php
class Telefone implements JsonSerializable{
	private $id;
	private $tipoEnumTelefone;
	private $numero;
	private $o_pessoa;
	private $dataCadastro;
	private $dataAtualizacao; 
	
	public function __construct($id="", $tipoEnumTelefone="", $numero="", $o_pessoa="", $dataCadastro="", $dataAtualizacao=""){
		$this->id= $id;
		$this->tipoEnumTelefone = $tipoEnumTelefone;
		$this->numero = $numero;
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
	public function getTipoEnumTelefone() {
		return $this->tipo;
	}
	public function setTipoEnumTelefone($tipo) {
		$this->tipo = $tipo;
	}
	public function getNumero() {
		return $this->numero;
	}
	public function setNumero($numero) {
		$this->numero = $numero;
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
					'tipoEnumTelefone' => $this->tipoEnumTelefone,
					'numero' => $this->numero,
					'dataCadastro' => $this->dataCadastro,
					'dataAtualizacao' => $this->dataAtualizacao
				);
	}

}
?>