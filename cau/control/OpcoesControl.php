<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Opcoes.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/OpcoesDAO.php';

class OpcoesControl{
	protected $con;
	protected $o_opcoes;
	protected $o_opcoesDAO;
	private $ultimoId;
	
	function __construct(Opcoes $o_opcoes= null){
		$this->con = Conexao::getInstance()->getConexao();
		$this->opcoesDAO = new OpcoesDAO($this->con);
		$this->o_opcoes = $o_opcoes;
	}

	public function getUltimoId() {
		return $this->ultimoId;
	}
	
	function cadastrar(){
		$this->ultimoId = $this->opcoesDAO->cadastrar($this->o_opcoes);
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