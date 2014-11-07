<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/PessoaDAO.php';

class PessoaControl{
	protected $con;
	protected $o_pessoa;
	protected $o_pessoaDAO;
	
	function __construct($o_pessoa=""){
		$conexao = new Conexao();
		$this->con = $conexao->getConnection();
		$this->pessoaDAO = new PessoaDAO($this->con);
		$this->o_pessoa = $o_pessoa;
	} 
	
	function cadastrar(){
		$this->pessoaDAO->cadastrar($this->o_pessoa);
	}
	
	function atualizar(){
		$this->pessoaDAO->atualizar($this->o_pessoa);
	}
	
	function deletar(){
		$this->pessoaDAO->deletar($this->o_pessoa);
	}
	
	function buscarPorId(){
		return $this->pessoaDAO->buscarPorId($this->o_pessoa);
	}
	
	function buscarPorNome(){
		return  $this->pessoaDAO->buscarPorNome($this->o_pessoa);
	}
	
	function listarTodos(){
		return $this->pessoaDAO->listarTodos();
	}
	
}
?>