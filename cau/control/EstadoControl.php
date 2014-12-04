<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Estado.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/EstadoDAO.php';

class EstadoControl{
	protected $con;
	protected $o_estado;
	protected $o_estadoDAO;
	
	function __construct($o_estado=""){
		$conexao = new Conexao();
		$this->con = $conexao->getConnection();
		$this->o_estadoDAO = new EstadoDAO($this->con);
		$this->o_estado = $o_estado;
	}
	
	function cadastrar(){
		$this->o_estadoDAO->cadastrar($this->o_estado);
	}
	
	function atualizar(){
		$this->o_estadoDAO->atualizar($this->o_estado);
	}
	
	function deletar(){
		$this->o_estadoDAO->deletar($this->o_estado);
	}
	
	function buscarPorId(){
		$this->o_estadoDAO->buscarPorId($this->o_estado);
	}
	
	function listarPorNome(){
		$this->o_estadoDAO->listarPorNome($this->o_estado);
	}
	
	function listarTodso(){
		$this->o_estadoDAO->listarTodos();
	}
}
?>