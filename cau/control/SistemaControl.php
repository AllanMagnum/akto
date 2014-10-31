<?php
include_once '../util/Conexao.php'; 

class SistemaControl{
	protected $con;
	protected $o_sistema;
	protected $o_sistemaDAO;

	function __construct($o_sistema=""){
		$conexao = new Conexao();
		$this->con = $conexao->getConnection();
		$this->sistemaDAO = new SistemaDAO($this->con);
		$this->o_sistema = $o_sistema;
	}

	function cadastrar(){
		$this->sistemaDAO->cadastrar($this->o_sistema);
	}

	function atualizar(){
		$this->sistemaDAO->atualizar($this->o_sistema);
	}

	function deletar(){
		$this->sistemaDAO->deletar($this->o_sistema);
	}

	function buscarPorId(){
		return $this->sistemaDAO->buscarPorId($this->o_sistema);
	}

	function listarTodos(){
		return $this->sistemaDAO->listarTodos();
	}

}
?>