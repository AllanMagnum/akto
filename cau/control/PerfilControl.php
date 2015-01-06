<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/PerfilDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Perfil.php';

class PerfilControl{
	protected $con;
	protected $o_perfil;
	protected $o_perfilDAO;
	private $ultimoId;
	
	function __construct(Perfil $o_perfil= null){
		$this->con = Conexao::getInstance()->getConexao();
		$this->perfilDAO = new PerfilDAO($this->con);
		$this->o_perfil = $o_perfil;
	}

	public function getUltimoId() {
		return $this->ultimoId;
	}
	
	function cadastrar(){
		$this->ultimoId = $this->perfilDAO->cadastrar($this->o_perfil);
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