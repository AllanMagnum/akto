<?php
class Perfil implements JsonSerializable{
	private $id;
	private $nome;
	private $dataCadastro;
	private $dataAtualizacao;
	
	function __construct($id="", $nome="", $dataCadastro="", $dataAtualizacao=""){
		$this->id= $id;
		$this->nome = $nome;
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
		return "Perfil [id=" . $this->id . ", nome=" . $this->nome . ", data cadastro=" . $this->dataCadastro . ", data atualizacao=" . $this->dataAtualizacao . "]";
	}
	
	public function toJson() {
		
	}
	public function jsonSerialize() {
		return [
				'id' => $this->id,
				'nome' => $this->nome,
				'dataCadastro' => $this->dataCadastro,
				'dataAtualizacao' => $this->dataAtualizacao
				];
	}

}

?>