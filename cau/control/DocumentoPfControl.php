<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/DocumentoPfDAO.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Documento.php';

class PerfilControl{
	protected $con;
	protected $o_documentoPf;
	protected $o_documentoPfDAO;

	function __construct($o_documentoPf=""){
		$conexao = new Conexao();
		$this->con = $conexao->getConnection();
		$this->o_documentoPfDAO = new DocumentoPfDAO($this->con);
		$this->o_documentoPf = $o_documentoPf;
	}

	function cadastrar(){
		$this->o_documentoPfDAO->cadastrar($this->o_documentoPf);
	}

	function atualizar(){
		$this->o_documentoPfDAO->atualizar($this->o_documentoPf);
	}

	function deletar(){
		$this->o_documentoPfDAO->deletar($this->o_documentoPf);
	}

	function buscarPorId(){
		return $this->o_documentoPfDAO->buscarPorId($this->o_documentoPf);
	}

	function listarPorPessoa(){
		return $this->o_documentoPfDAO->listarPorPessoa($this->o_documentoPf);
	}

}
?>