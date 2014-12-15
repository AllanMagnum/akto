<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/ContatoPF.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/ContatoPFDAO.php';

class ContatoPFControl{
	protected $con;
	protected $o_contatoPF;
	protected $o_contatoPFDAO;
	
	function __construct(ContatoPF $o_contatoPF= null){
		$this->con = Conexao::getInstance()->getConexao();
		$this->o_contatoPFDAO = new ContatoPFDAO($this->con);
		$this->o_contatoPF = $o_contatoPF;
	}
	
	function cadastrar(){
		$this->o_contatoPFDAO->cadastrar($this->o_contatoPF);
	}
	
	function atualizar(){
		$this->o_contatoPFDAO->atualizar($this->o_contatoPF);
	}
	
	function deletar(){
		$this->o_contatoPFDAO->deletar($this->o_contatoPF);
	}
	
	function listarPaginadoPorPessoa($start, $limit){
		return $this->o_contatoPFDAO->listarPaginadoPorPessoa($this->o_contatoPF, $start, $limit);
	}
	
	function qtdeTotalPorPessoa(){
		return $this->o_contatoPFDAO->qtdTotalPorPessoa($this->o_contatoPF);
	}
}