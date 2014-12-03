<?php
class TipoEndereco implements JsonSerializable{
	private $id;
	private $descricao;
	private $dataCadastro;
	private $dataAtualizacao;
	
	public function __construct($id="", $descricao="", $dataCadastro="", $dataAtualizacao="" ){
		$this->id = $id;
		$this->descricao = $descricao;
		$this->dataCadastro = $dataCadastro;
		$this->dataAtualizacao = $dataAtualizacao;
	}
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function getDescricao() {
		return $this->descricao;
	}
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
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
		"Tipo endereco [ id= " . $this->id . ", descricao= " . $this->descricao . ", data de cadastro= " . $this->dataCadastro . ", data de atualizacao= " . $this->dataAtualizacao . "]";
	} 
	
	public function jsonSerialize() {
		return array(
				'id' => $this->id,
				'descricao' => $this->descricao,
				'dataCadastro' => $this->dataCadastro,
				'dataAtualizacao' => $this->dataAtualizacao
		);
	}

}
?>