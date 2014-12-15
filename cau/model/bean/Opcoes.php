<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Sistema.php';

class Opcoes implements JsonSerializable {
	private $id;
	private $nome;
	private $tipo;
	private $url;
	private $o_sistema;
	private $dataCadastro;
	private $dataAtualizacao;
	
	function __construct($id = null, $nome = null, $tipo = null, $url = null, Sistema $o_sistema=null, $dataCadastro = null, $dataAtualizacao = null) {
		$this->id = $id;
		$this->nome = $nome;
		$this->tipo = $tipo;
		$this->url = $url;
		$this->o_sistema = $o_sistema;
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
	public function getTipo() {
		return $this->tipo;
	}
	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}
	public function getUrl() {
		return $this->url;
	}
	public function setUrl($url) {
		$this->url = $url;
	}
	public function getOSistema() {
		return $this->o_sistema;
	}
	public function setOSistema($o_sistema) {
		$this->o_sistema = $o_sistema;
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
		return "Opcoes [id=" . $this->id . ", nome=" . $this->nome . ", tipo=" . $this->tipo . ", url=" . $this->url . ", sistema=" . $this->o_sistema . ", data cadastro=" . $this->dataCadastro . ", data atualizacao=" . $this->dataAtualizacao . "]";
	}
	
	public function jsonSerialize() {
		return [
				'id' => $this->id,
				'nome' => $this->nome,
				'tipo' => $this->tipo,
				'url' => $this->url,
				'dataCadastro' => $this->dataCadastro,
				'dataAtualizacao' => $this->dataAtualizacao,
				'o_sistema' => $this->o_sistema
		];
	}

}
?>