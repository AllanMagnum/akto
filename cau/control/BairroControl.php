<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Bairro.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/BairroDAO.php';

class BairroControl{
	protected $con;
	protected $o_bairro;
	protected $o_bairroDAO;
	
	function __construct($o_bairro=""){
		$conexao = new Conexao();
		$this->con = $conexao->getConnection();
		$this->o_bairroDAO = new BairroDAO($this->con);
		$this->o_bairro = $o_bairro;
	}
	
	function cadastrar(){
		$this->o_bairroDAO->cadastrar($this->o_bairro);
	}
	
	function atualizar(){
		$this->o_bairroDAO->atualizar($this->o_bairro);
	}
	
	function deletar(){
		$this->o_bairroDAO->deletar($this->o_bairro);
	}
	
	function buscarPorId(){
		$this->o_bairroDAO->buscarPorId($this->o_bairro);
	}
	
	function listarPorNome(){
		$this->o_bairroDAO->listarPorNome($this->o_bairro);
	}
	
	function listarTodos(){
		$this->o_bairroDAO->listarTodos();
	}
}
?>