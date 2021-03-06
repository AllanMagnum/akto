<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Cidade.php';

class Bairro implements JsonSerializable{
	private $id;
	private $nome;
	private $o_cidade;
	
	function __construct($id=null, $nome=null, Cidade $o_cidade=null){
		$this->id= $id;
		$this->nome = $nome;
		$this->o_cidade = $o_cidade;
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
	public function getOCidade() {
		return $this->o_cidade;
	}
	public function setOCidade(Cidade $o_cidade) {
		$this->o_cidade = $o_cidade;
	}
	
	function __toString(){
		return "Bairro [ id= " . $this->id . ", nome=" . $this->nome . ", " . $this->o_cidade . " ]";
	}
	
	public function jsonSerialize() {
		return [
			'id' => $this->id,
			'nome' => $this->nome,
			'o_cidade' => $this->o_cidade		
		];
	}

}
?>