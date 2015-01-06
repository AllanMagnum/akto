<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/SistemaDAO.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Sistema.php';

class SistemaControl{
	protected $con;
	protected $o_sistema;
	protected $o_sistemaDAO;
	private $ultimoId;
	
	function __construct(Sistema $o_sistema= null){
		$this->con = Conexao::getInstance()->getConexao();
		$this->o_sistemaDAO = new SistemaDAO($this->con);
		$this->o_sistema = $o_sistema;
	}

	public function getUltimoId() {
		return $this->ultimoId;
	}
	
	function cadastrar(){
		$this->ultimoId = $this->o_sistemaDAO->cadastrar($this->o_sistema);
	}

	function atualizar(){
		$this->o_sistemaDAO->atualizar($this->o_sistema);
	}

	function deletar(){
		$this->o_sistemaDAO->deletar($this->o_sistema);
	}

	function buscarPorId(){
		return $this->o_sistemaDAO->buscarPorId($this->o_sistema);
	}

	function listarTodos(){
		return $this->o_sistemaDAO->listarTodos();
	}
	
	function listarOpcoes(){
		return $this->o_sistemaDAO->listarOpcoes($this->o_sistema);
	}

}
?>