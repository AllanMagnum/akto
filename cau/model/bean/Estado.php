<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Pais.php';

class Estado implements JsonSerializable{
	private $id;
	private $nome;
	private $sigla;
	private $o_pais;

	public function __construct($id=null, $nome=null, $sigla=null, Pais $o_pais= null){
		$this->id = $id;
		$this->nome = $nome;
		$this->sigla = $sigla;
		$this->o_pais = $o_pais;
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
	public function getOPais() {
		return $this->o_pais;
	}
	public function setOPais(Pais $o_pais) {
		$this->o_pais = $o_pais;
	}
	
	public function __toString(){
		return "Estado [ id= " . $this->id . ", nome= " . $this->nome . ", sigla= " . $this->sigla . ", " . $this->o_pais . " ]";
	}

	public function jsonSerialize() {
		return [
			'id' => $this->id,
			'nome' => $this->nome,
			'sigla' => $this->sigla,
			'o_pais' => $this->o_pais->jsonSerialize()
		];
	}

}
?>