<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/DocumentoPFDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/DocumentoPF.php';

class PerfilControl{
	protected $con;
	protected $o_documentoPF;
	protected $o_documentoPFDAO;

	function __construct(DocumentoPF $o_documentoPF= null){
		$conexao = new Conexao();
		$this->con = $conexao->getConnection();
		$this->o_documentoPFDAO = new DocumentoPFDAO($this->con);
		$this->o_documentoPF = $o_documentoPF;
	}

	function cadastrar(){
		$this->o_documentoPFDAO->cadastrar($this->o_documentoPF);
	}

	function atualizar(){
		$this->o_documentoPFDAO->atualizar($this->o_documentoPF);
	}

	function deletar(){
		$this->o_documentoPFDAO->deletar($this->o_documentoPF);
	}

	function buscarPorId(){
		return $this->o_documentoPFDAO->buscarPorId($this->o_documentoPF);
	}

	function listarPorPessoa(){
		return $this->o_documentoPFDAO->listarPorPessoa($this->o_documentoPF);
	}

}
?>