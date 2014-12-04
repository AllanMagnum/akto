<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Opcoes.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/OpcoesDAO.php';

class OpcoesControl{
	protected $con;
	protected $o_opcoes;
	protected $o_opcoesDAO;

	function __construct($o_opcoes=""){
		$conexao = new Conexao();
		$this->con = $conexao->getConnection();
		$this->opcoesDAO = new OpcoesDAO($this->con);
		$this->o_opcoes = $o_opcoes;
	}

	function cadastrar(){
		$this->opcoesDAO->cadastrar($this->o_opcoes);
	}

	function atualizar(){
		$this->opcoesDAO->atualizar($this->o_opcoes);
	}

	function deletar(){
		$this->opcoesDAO->deletar($this->o_opcoes);
	}

	function buscarPorId(){
		return $this->opcoesDAO->buscarPorId($this->o_opcoes);
	}

	function listarPorSistema(){
		return $this->opcoesDAO->listarPorSistema($this->o_opcoes);
	}

}
?>