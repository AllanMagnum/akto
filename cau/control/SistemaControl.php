<?php
include_once '../util/Conexao.php';
include_once '../model/dao/SistemaDAO.php'; 

class SistemaControl{
	protected $con;
	protected $o_sistema;
	protected $o_sistemaDAO;

	function __construct($o_sistema=""){
		$conexao = new Conexao();
		$this->con = $conexao->getConnection();
		$this->o_sistemaDAO = new SistemaDAO($this->con);
		$this->o_sistema = $o_sistema;
	}

	function cadastrar(){
		$this->o_sistemaDAO->cadastrar($this->o_sistema);
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

}
?>