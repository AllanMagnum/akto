<?php
include_once '../util/Conexao.php';
include_once '../model/dao/OpcoesDAO.php';

class Opcoes {
	private $id;
	private $nome;
	private $tipo;
	private $url;
	private $dataCadastro;
	private $dataAtualizacao;
	private $o_sistema;
	
	function __construct($id = "", $nome = "", $tipo = "", $url = "", $dataCadastro = "", $dataAtualizacao = "", $o_sistema="") {
		$this->id = $id;
		$this->nome = $nome;
		$this->tipo = $tipo;
		$this->url = $url;
		$this->dataCadastro = $dataCadastro;
		$this->dataAtualizacao = $dataAtualizacao;
		$this->o_sistema = $o_sistema;
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
	public function getOSistema() {
		return $this->o_sistema;
	}
	public function setOSistema($o_sistema) {
		$this->o_sistema = $o_sistema;
	}
	
	public function __toString(){
		return "Opcoes [id=" . $this->id . ", nome=" . $this->nome . ", tipo=" . $this->tipo . ", url=" . $this->url . ", sistema=" . $this->o_sistema . ", data cadastro=" . $this->dataCadastro . ", data atualizacao=" . $this->dataAtualizacao . "]";
	}
}
?>