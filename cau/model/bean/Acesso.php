<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Perfil.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Sistema.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Opcoes.php';

class Acesso implements JsonSerializable{
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
	
	function __construct(Usuario $o_usuario=null, Perfil $o_perfil=null, Sistema $o_sistema=null, Opcoes $o_opcoes=null, $visualizar=null, $cadastrar=null, $consultar=null, $atualizar=null, $deletar=null, $dataCadastro=null, $dataAtualizacao=null){
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
	public function setOUsuario(Usuario $o_usuario) {
		$this->o_usuario = $o_usuario;
	}
	public function getOPerfil() {
		return $this->o_perfil;
	}
	public function setOPerfil(Perfil $o_perfil) {
		$this->o_perfil = $o_perfil;
	}
	public function getOSistema() {
		return $this->o_sistema;
	}
	public function setOSistema(Sistema $o_sistema) {
		$this->o_sistema = $o_sistema;
	}
	public function getOOpcoes() {
		return $this->o_opcoes;
	}
	public function setOOpcoes(Opcoes $o_opcoes) {
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
	
	public function toJson() {
		return json_encode(array(
				'o_usuario' => $this->o_usuario->toJson(),
				'o_perfil' => $this->o_perfil->toJson(),
				'o_sistema' => $this->o_sistema->toJson(),
				'o_opcoes' => $this->o_opcoes->toJson(),
				'visualizar' => $this->visualizar,
				'cadastrar' => $this->cadastrar,
				'consultar' => $this->consultar,
				'atualizar' => $this->atualizar,
				'deletar' => $this->deletar,
				'dataCadastro' => $this->dataCadastro,
				'dataAtualizacao' => $this->dataAtualizacao
		));
	}
	
	public function jsonSerialize() {
		return [
				'o_usuario' => $this->o_usuario->toJson(),
				'o_perfil' => $this->o_perfil->toJson(),
				'o_sistema' => $this->o_sistema->toJson(),
				'o_opcoes' => $this->o_opcoes->toJson(),
				'visualizar' => $this->visualizar,
				'cadastrar' => $this->cadastrar,
				'consultar' => $this->consultar,
				'atualizar' => $this->atualizar,
				'deletar' => $this->deletar,
				'dataCadastro' => $this->dataCadastro,
				'dataAtualizacao' => $this->dataAtualizacao
				];
	}

}
?>