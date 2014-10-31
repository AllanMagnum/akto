<?php
include_once 'Pessoa.php';

class Usuario extends Pessoa {
	private $id;
	private $login;
	private $senha;
	private $o_perfil;
	private $o_pessoa;
	private $dataCadastro;
	private $dataAtualizacao;
	
	function __construct($id="", $login="", $senha="", $o_perfil="", $o_pessoa="", $dataCadastro="", $dataAtualizacao=""){
		$this->id = $id;
		$this->login = $login;
		$this->senha= $senha;
		$this->o_perfil= $o_perfil;
		$this->o_pessoa = $o_pessoa;
		$this->dataCadastro = $dataCadastro;
		$this->dataAtualizacao = $dataAtualizacao;
	}
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function getLogin() {
		return $this->login;
	}
	public function setLogin($login) {
		$this->login = $login;
	}
	public function getSenha() {
		return $this->senha;
	}
	public function setSenha($senha) {
		$this->senha = $senha;
	}
	public function getOPerfil() {
		return $this->perfil;
	}
	public function setOPerfil($perfil) {
		$this->perfil = $perfil;
	}
	public function getOPessoa() {
		return $this->pessoa;
	}
	public function setOPessoa($pessoa) {
		$this->pessoa = $pessoa;
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
	
}
?>