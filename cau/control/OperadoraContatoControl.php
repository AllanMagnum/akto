<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/OperadoraContato.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/OperadoraContatoDAO.php';

class OperadoraContatoControl{
	protected $con;
	protected $o_operadoraContato;
	protected $o_operadoraContatoDAO;
	
	function __construct(OperadoraContato $o_operadoraContato= null){
		$this->con = Conexao::getInstance()->getConexao();
		$this->o_operadoraContatoDAO = new OperadoraContatoDAO($this->con);
		$this->o_operadoraContato = $o_operadoraContato;
	}
	
	function cadastrar(){
		$this->o_operadoraContatoDAO->cadastrar($this->o_operadoraContato);
	}
	
	function atualizar(){
		$this->o_operadoraContatoDAO->atualizar($this->o_operadoraContato);
	}
	
	function deletar(){
		$this->o_operadoraContatoDAO->deletar($this->o_operadoraContato);
	}
	
	function buscarPorId(){
		return $this->o_operadoraContatoDAO->buscarPorId($this->o_operadoraContato);
	}
	
	function listarPorNome(){
		return $this->o_operadoraContatoDAO->listarPorNome($this->o_operadoraContato);
	}
	
	function listarTodos(){
		return $this->o_operadoraContatoDAO->listarTodos();
	}
	
}