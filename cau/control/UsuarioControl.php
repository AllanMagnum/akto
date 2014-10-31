<?php
include_once '../util/Conexao.php';

class UsuarioControl{
	protected $con;
	protected $o_usuario;
	protected $o_usuarioDAO;
	
	function __construct($o_usuario=""){
		$conexao = new Conexao();
		$this->con = $conexao->getConnection();
		$this->usuarioDAO = new UsuarioDAO($this->con);
		$this->o_usuario = $o_usuario;
	}
	
	function cadastrar(){
		$this->usuarioDAO->cadastrar($this->o_usuario);
	}
	
	function atualizar(){
		$this->usuarioDAO->atualizar($this->o_usuario);
	}
	
	function deletar(){
		$this->usuarioDAO->deletar($this->o_usuario);
	}
	
	function buscarPorId(){
		return $this->usuarioDAO->buscarPorId($this->o_usuario);
	}
	
	function listarTodos(){
		return $this->usuarioDAO->listarTodos();
	}	
}
?>