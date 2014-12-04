<?php
class Pais implements JsonSerializable{
	private $id;
	private $nome;
	private $sigla;
	
	public function __construct($id="", $nome="", $sigla=""){
		$this->id = $id;
		$this->nome = $nome;
		$this->sigla = $sigla;
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
	public function getSigla() {
		return $this->sigla;
	}
	public function setSigla($sigla) {
		$this->sigla = $sigla;
	}
	
	public function __toString(){
		return "Pais [ id= " . $this->id . ", nome= " . $this->nome . ", sigla= " . $this->sigla . " ]";
	}
	
	public function jsonSerialize() {
		return [ 
			   	'id' => $this->id,
				'nome' => $this->nome,
				'sigla' => $this->sigla
		         ];
	}

}
?>