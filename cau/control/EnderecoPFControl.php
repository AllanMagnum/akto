<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/EnderecoPF.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/EnderecoPFDAO.php';

class EnderecoPFControl{
	protected $con;
	protected $o_enderecoPF;
	protected $o_enderecoPFDAO;
	
	function __construct(EnderecoPF $o_enderecoPF= null){
		$this->con = Conexao::getInstance()->getConexao();
		$this->o_enderecoPFDAO = new EnderecoPFDAO($this->con);
		$this->o_enderecoPF = $o_enderecoPF;
	}	
	
	function cadastrar(){
		$this->o_enderecoPFDAO->cadastrar($this->o_enderecoPF);
	}
	
	function atualizar(){
		$this->o_enderecoPFDAO->atualizar($this->o_enderecoPF);
	}
	
	function deletar(){
		$this->o_enderecoPFDAO->deletar($this->o_enderecoPF);
	}
	
	function listarPaginadoPorPessoa($start, $limit){
		return $this->o_enderecoPFDAO->listarPaginadoPorPessoa($this->o_enderecoPF, $start, $limit);
	}
	
	function qtdeTotalPorPessoa(){
		return $this->o_enderecoPFDAO->qtdTotalPorPessoa($this->o_enderecoPF);
	}
}