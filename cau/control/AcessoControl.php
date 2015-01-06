<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Acesso.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/AcessoDAO.php';

class AcessoControl{
	protected $con;
	protected $o_acesso;
	protected $o_acessoDAO;
	private $ultimoId;
	
	function __construct(Acesso $o_acesso= null){
		$this->con = Conexao::getInstance()->getConexao();
		$this->acessoDAO = new AcessoDAO($this->con);
		$this->o_acesso = $o_acesso;
	}

	public function getUltimoId() {
		return $this->ultimoId;
	}
	
	function cadastrar(){
		$this->ultimoId = $this->acessoDAO->cadastrar($this->o_acesso);
	}

	function atualizar(){
		$this->acessoDAO->atualizar($this->o_acesso);
	}
	
	function deletar(){
		$this->acessoDAO->deletar($this->o_acesso);
	}
	
	function buscarPorUsuario(){
		return $this->acessoDAO->buscarPorUsuario($this->o_acesso);
	}
	
	function buscarPorPerfil(){
		return $this->acessoDAO->buscarPorPerfil($this->o_acesso);
	}
	
	function buscarPorSistema(){
		return $this->acessoDAO->buscarPorSistema($this->o_acesso);
	}

	function listarTodos(){
		return $this->acessoDAO->listarTodos();
	}

}
?>