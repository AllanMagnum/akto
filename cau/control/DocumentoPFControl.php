<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/DocumentoPFDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/DocumentoPF.php';

class DocumentoPFControl{
	protected $con;
	protected $o_documentoPF;
	protected $o_documentoPFDAO;
	private $ultimoId;
	
	function __construct(DocumentoPF $o_documentoPF= null){
		$this->con = Conexao::getInstance()->getConexao();
		$this->o_documentoPFDAO = new DocumentoPFDAO($this->con);
		$this->o_documentoPF = $o_documentoPF;
	}

	public function getUltimoId() {
		return $this->ultimoId;
	}
	
	function cadastrar(){
		$this->ultimoId = $this->o_documentoPFDAO->cadastrar($this->o_documentoPF);
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