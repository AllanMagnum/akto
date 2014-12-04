<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/PessoaFisica.php';

class Usuario extends PessoaFisica implements JsonSerializable{
	private $id;
	private $login;
	private $senha;
	private $o_perfil;
	private $o_pessoaFisica;
	private $dataCadastro;
	private $dataAtualizacao;
	
	function __construct($id="", $login="", $senha="", $o_perfil="", $o_pessoaFisica="", $dataCadastro="", $dataAtualizacao=""){
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
	public function getOPessoa() {
		return $this->o_pessoa;
	}
	public function setOPessoa($o_pessoa) {
		$this->o_pessoa = $o_pessoa;
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
		return "Usuario [id=" . $this->id . ", login=" . $this->login . ", senha=" . $this->senha . ", data cadastro=" . $this->dataCadastro . ", data atualizacao=" . $this->dataAtualizacao . ", pessoa=" . $this->o_pessoa . ", perfil=" . $this->o_perfil . "]";  
	}

	public function jsonSerialize() {
		return array(
				'id' => $this->id,
				'login' => $this->login,
				'senha' => $this->senha,
				'perfil' => $this->o_perfil->toJson(),
				'pessoa' => $this->o_pessoa->toJson(),
				'dataCadastro' => $this->dataCadastro,
				'dataAtualizacao' => $this->dataAtualizacao
		);
	}

}
?>