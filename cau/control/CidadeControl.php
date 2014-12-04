<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Cidade.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/CidadeDAO.php';

class CidadeControl{
	protected $con;
	protected $o_cidade;
	protected $o_cidadeDAO;
	
	function __construct($o_cidade=""){
		$conexao = new Conexao();
		$this->con = $conexao->getConnection();
		$this->o_cidadeDAO = new CidadeDAO($this->con);
		$this->o_cidade = $o_cidade;
	}
	
	function cadastrar(){
		$this->o_cidadeDAO->cadastrar($this->o_cidade);
	}
	
	function atualizar(){
		$this->o_cidadeDAO->atualizar($this->o_cidade);
	}
	
	function deletar(){
		$this->o_cidadeDAO->deletar($this->o_cidade);
	}
	
	function buscarPorId(){
		$this->o_cidadeDAO->buscarPorId($this->o_cidade);
	}
	
	function listarPorNome(){
		$this->o_cidadeDAO->listarPorNome($this->o_cidade);
	}
	
	function listarTodos(){
		$this->o_cidadeDAO->listarTodos();
	}
}
?>