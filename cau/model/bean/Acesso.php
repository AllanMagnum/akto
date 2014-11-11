<?php
class Acesso{
	private $o_usuario;
	private $o_perfil;
	private $o_sistema;
	private $o_opcoes;
	private $visualizar;
	private $cadastrar;
	private $consultar;
	private $atualizar;
	private $deletar;
	private $dataCadastro;
	private $dataAtualizacao;
	
	function __construct($o_usuario="", $o_perfil="", $o_sistema="", $o_opcoes="", $visualizar="", $cadastrar="", $consultar="", $atualizar="", $deletar="", $dataCadastro="", $dataAtualizacao=""){
		$this->o_usuario = $o_usuario;
		$this->o_perfil = $o_perfil;
		$this->o_sistema = $o_sistema;
		$this->o_opcoes = $o_opcoes;
		$this->visualizar = $visualizar;
		$this->cadastrar = $cadastrar;
		$this->consultar = $consultar;
		$this->atualizar = $atualizar;
		$this->deletar = $deletar;
		$this->dataCadastro = $dataCadastro;
		$this->dataAtualizacao = $dataAtualizacao;
	}
	
	public function getOUsuario() {
		return $this->o_usuario;
	}
	public function setOUsuario($o_usuario) {
		$this->o_usuario = $o_usuario;
	}
	public function getOPerfil() {
		return $this->o_perfil;
	}
	public function setOPerfil($o_perfil) {
		$this->o_perfil = $o_perfil;
	}
	public function getOSistema() {
		return $this->o_sistema;
	}
	public function setOSistema($o_sistema) {
		$this->o_sistema = $o_sistema;
	}
	public function getOOpcoes() {
		return $this->o_opcoes;
	}
	public function setOOpcoes($o_opcoes) {
		$this->o_opcoes = $o_opcoes;
	}
	public function getVisualizar() {
		return $this->visualizar;
	}
	public function setVisualizar($visualizar) {
		$this->visualizar = $visualizar;
	}
	public function getCadastrar() {
		return $this->cadastrar;
	}
	public function setCadastrar($cadastrar) {
		$this->cadastrar = $cadastrar;
		return $this;
	}
	public function getConsultar() {
		return $this->consultar;
	}
	public function setConsultar($consultar) {
		$this->consultar = $consultar;
		return $this;
	}
	public function getAtualizar() {
		return $this->atualizar;
	}
	public function setAtualizar($atualizar) {
		$this->atualizar = $atualizar;
	}
	public function getDeletar() {
		return $this->deletar;
	}
	public function setDeletar($deletar) {
		$this->deletar = $deletar;
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
		return "Sistema [ Usuario= " . $this->o_usuario . ", Perifl=" . $this->o_perfil . ", sistema= " . $this->o_sistema . ", opcoes= " . $this->o_opcoes . ", visualizar= " . $this->visualizar . ", cadastrar= " . $this->cadastrar . ", consultar= " . $this->consultar . ", atualizar= " . $this->atualizar .  ", data cadastro=" . $this->dataCadastro . ", data atualizacao=" . $this->dataAtualizacao . ", pessoa=" . "]";
	}
}
?>