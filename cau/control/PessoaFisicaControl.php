<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/PessoaDAO.php';

class PessoaFisicaControl{
	protected $con;
	protected $o_pessoaFisica;
	protected $o_pessoaFisicaDAO;
	
	function __construct($o_pessoa=""){
		$conexao = new Conexao();
		$this->con = $conexao->getConnection();
		$this->pessoaFisicaDAO = new PessoaFisicaDAO($this->con);
		$this->o_pessoaFisica = $o_pessoa;
	} 
	
	function cadastrar(){
		$this->pessoaFisicaDAO->cadastrar($this->o_pessoaFisica);
	}
	
	function atualizar(){
		$this->pessoaFisicaDAO->atualizar($this->o_pessoaFisica);
	}
	
	function deletar(){
		$this->pessoaFisicaDAO->deletar($this->o_pessoaFisica);
	}
	
	function buscarPorId(){
		return $this->pessoaFisicaDAO->buscarPorId($this->o_pessoaFisica);
	}
	
	function buscarPorNome(){
		return $this->pessoaFisicaDAO->buscarPorNome($this->o_pessoaFisica);
	}
	
	function listarPaginado($start, $limit){
		return $this->pessoaFisicaDAO->listarPaginado($start, $limit);
	}
	
	function qtdTotal(){
		return $this->pessoaFisicaDAO->qtdTotal();
	}
	
}
?>