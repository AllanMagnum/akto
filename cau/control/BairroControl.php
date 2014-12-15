<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Bairro.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/BairroDAO.php';

class BairroControl{
	protected $con;
	protected $o_bairro;
	protected $o_bairroDAO;
	
	function __construct(Bairro $o_bairro= null){
		$this->con = Conexao::getInstance()->getConexao();
		$this->o_bairroDAO = new BairroDAO($this->con);
		$this->o_bairro = $o_bairro;
	}
	
	function cadastrar(){
		$this->o_bairroDAO->cadastrar($this->o_bairro);
	}
	
	function atualizar(){
		$this->o_bairroDAO->atualizar($this->o_bairro);
	}
	
	function deletar(){
		$this->o_bairroDAO->deletar($this->o_bairro);
	}
	
	function buscarPorId(){
		return $this->o_bairroDAO->buscarPorId($this->o_bairro);
	}
	
	function listarPorNome(){
		return $this->o_bairroDAO->listarPorNome($this->o_bairro);
	}
	
	function listarTodos(){
		return $this->o_bairroDAO->listarTodos();
	}
}
?>