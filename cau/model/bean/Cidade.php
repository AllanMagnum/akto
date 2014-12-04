<?php
class Cidade implements JsonSerializable{
	private $id;
	private $nome;
	private $o_estado;
	
	function __construct($id="", $nome="", $o_estado=""){
		$this->id= $id;
		$this->nome= $nome;
		$this->o_estado = $o_estado;
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
	public function getOEstado() {
		return $this->o_estado;
	}
	public function setOEstado($o_estado) {
		$this->o_estado = $o_estado;
	}
	
	function __toString(){
		return "Cidade [ id= " . $this->id . ", nome= " . $this->nome . ", " . $this->o_estado . " ]";
	}
	
	public function jsonSerialize() {
		return [
			'id' => $this->id,
			'nome' => $this->nome,
			'o_estado' => $this->o_estado->jsonSerialize()
		];
	}

}	
?>