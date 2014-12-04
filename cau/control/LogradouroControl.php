<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Logradouro.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/LogradouroDAO.php';

class BairroControl{
	protected $con;
	protected $o_logradouro;
	protected $o_logradouroDAO;

	function __construct($o_logradouro=""){
		$conexao = new Conexao();
		$this->con = $conexao->getConnection();
		$this->o_logradouroDAO = new LogradouroDAO($this->con);
		$this->o_logradouro = $o_logradouro;
	}

	function cadastrar(){
		$this->o_logradouroDAO->cadastrar($this->o_logradouro);
	}

	function atualizar(){
		$this->o_logradouroDAO->atualizar($this->o_logradouro);
	}

	function deletar(){
		$this->o_logradouroDAO->deletar($this->o_logradouro);
	}

	function buscarPorId(){
		$this->o_logradouroDAO->buscarPorId($this->o_logradouro);
	}

	function listarTodos(){
		$this->o_logradouroDAO->listarTodos();
	}
}
?>