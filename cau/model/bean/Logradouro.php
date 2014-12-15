<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Bairro.php'; 

class Logradouro implements JsonSerializable{
	private $id;
	private $cep;
	private $tipo;
	private $endereco;
	private $o_bairro;
	
	function __construct($id=null, $cep=null, $tipo=null, $endereco=null, Bairro $o_bairro=null){
		$this->id = $id;
		$this->cep = $cep;
		$this->tipo = $tipo;
		$this->endereco = $endereco;
		$this->o_bairro = $o_bairro;	
	}
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function getCep() {
		return $this->cep;
	}
	public function setCep($cep) {
		$this->cep = $cep;
	}
	public function getTipo() {
		return $this->tipo;
	}
	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}
	public function getEndereco() {
		return $this->endereco;
	}
	public function setEndereco($endereco) {
		$this->endereco = $endereco;
	}
	public function getOBairro() {
		return $this->o_bairro;
	}
	public function setOBairro(Bairro $o_bairro) {
		$this->o_bairro = $o_bairro;
	}
	
	function __toString(){
		"Logradouro [ id= " . $this->id . ", cep= " . $this->cep . ", tipo= " . $this->tipo . ", endereco= " . $this->endereco . ", " . $this->o_bairro . " ]";
	}
	
	public function jsonSerialize() {
		return [
					'id' => $this->id,
					'cep' => $this->cep,
					'tipo' => $this->tipo,
					'endereco' => $this->endereco,
					'o_bairro' => $this->o_bairro->jsonSerialize()
				];	
	}

}
?>