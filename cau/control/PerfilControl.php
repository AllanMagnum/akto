<?php
include_once '../util/Conexao.php';

class PerfilControl{
	protected $con;
	protected $o_perfil;
	protected $o_perfilDAO;

	function __construct($o_perfil=""){
		$conexao = new Conexao();
		$this->con = $conexao->getConnection();
		$this->perfilDAO = new PerfilDAO($this->con);
		$this->o_perfil = $o_perfil;
	}

	function cadastrar(){
		$this->perfilDAO->cadastrar($this->o_perfil);
	}

	function atualizar(){
		$this->perfilDAO->atualizar($this->o_perfil);
	}

	function deletar(){
		$this->perfilDAO->deletar($this->o_perfil);
	}

	function buscarPorId(){
		return $this->perfilDAO->buscarPorId($this->o_perfil);
	}

	function listarTodos(){
		return $this->perfilDAO->listarTodos();
	}

}
?>