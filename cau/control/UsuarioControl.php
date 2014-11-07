<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/UsuarioDAO.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Usuario.php';

class UsuarioControl{
	protected $con;
	protected $o_usuario;
	protected $o_usuarioDAO;
	
	function __construct($o_usuario=""){
		$conexao = new Conexao();
		$this->con = $conexao->getConnection();
		$this->o_usuarioDAO = new UsuarioDAO($this->con);
		$this->o_usuario = $o_usuario;
	}
	
	public function cadastrar(){
		$this->o_usuarioDAO->cadastrar($this->o_usuario);
	}
	
	public function atualizar(){
		$this->o_usuarioDAO->atualizar($this->o_usuario);
	}
	
	public function deletar(){
		$this->o_usuarioDAO->deletar($this->o_usuario);
	}
	
	public function buscarPorId(){
		return $this->o_usuarioDAO->buscarPorId($this->o_usuario);
	}
	
	function listarTodos(){
		return $this->o_usuarioDAO->listarTodos();
	}

	public function autenticar(){
		return $this->o_usuarioDAO->autenticar($this->o_usuario);
	}
}
?>