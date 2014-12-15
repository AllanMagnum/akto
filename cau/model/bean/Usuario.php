<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/PessoaFisica.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Perfil.php';

class Usuario extends PessoaFisica implements JsonSerializable{
	private $id;
	private $login;
	private $senha;
	private $o_perfil;
	private $o_pessoaFisica;
	private $dataCadastro;
	private $dataAtualizacao;
	
	function __construct($id=null, $login=null, $senha=null, Perfil $o_perfil=null, PessoaFisica $o_pessoaFisica=null, $dataCadastro=null, $dataAtualizacao=null){
		$this->id = $id;
		$this->login = $login;
		$this->senha= $senha;
		$this->o_perfil= $o_perfil;
		$this->o_pessoaFisica = $o_pessoaFisica;
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
		$this->senha = base64_encode($senha);
	}
	public function getOPerfil() {
		return $this->o_perfil;
	}
	public function setOPerfil($o_perfil) {
		$this->o_perfil = $o_perfil;
	}
	public function getOPessoaFisica() {
		return $this->o_pessoaFisica;
	}
	public function setOPessoaFisica($o_pessoaFisica) {
		$this->o_pessoaFisica = $o_pessoaFisica;
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
	
	public function __toString() {
		return "Usuario [id=" . $this->id . ", login=" . $this->login . ", senha=" . $this->senha . ", data cadastro=" . $this->dataCadastro . ", data atualizacao=" . $this->dataAtualizacao . ", " . $this->o_pessoaFisica . ", perfil=" . $this->o_perfil . "]";  
	}

	public function jsonSerialize() {
		return [
				'id' => $this->id,
				'login' => $this->login,
				'senha' => $this->senha,
				'perfil' => $this->o_perfil->toJson(),
				'pessoa' => $this->o_pessoa->toJson(),
				'dataCadastro' => $this->dataCadastro,
				'dataAtualizacao' => $this->dataAtualizacao
				];
	}

}
?>