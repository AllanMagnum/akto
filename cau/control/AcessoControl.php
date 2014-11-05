<?php
include_once '../util/Conexao.php';

class AcessoControl{
	protected $con;
	protected $o_acesso;
	protected $o_acessoDAO;

	function __construct($o_acesso=""){
		$conexao = new Conexao();
		$this->con = $conexao->getConnection();
		$this->acessoDAO = new AcessoDAO($this->con);
		$this->o_acesso = $o_acesso;
	}

	function cadastrar(){
		$this->acessoDAO->cadastrar($this->o_acesso);
	}

	function atualizar(){
		$this->acessoDAO->atualizar($this->o_acesso);
	}

	function deletar(){
		$this->acessoDAO->deletar($this->o_acesso);
	}

	function buscarPorId(){
		return $this->acessoDAO->buscarPorId($this->o_acesso);
	}

	function listarTodos(){
		return $this->acessoDAO->listarTodos();
	}

}
?>