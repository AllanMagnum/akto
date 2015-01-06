<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/TipoEndereco.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/TipoEnderecoDAO.php';

class TipoEnderecoControl{
	protected $con;
	protected $o_tipoEndereco;
	protected $o_tipoEnderecoDAO;
	private $ultimoId;
	
	function __construct(TipoEndereco $o_tipoEndereco= null){
		$this->con = Conexao::getInstance()->getConexao();
		$this->o_tipoEnderecoDAO = new TipoEnderecoDAO($this->con);
		$this->o_tipoEndereco = $o_tipoEndereco;
	}

	public function getUltimoId() {
		return $this->ultimoId;
	}
	
	function cadastrar(){
		$this->ultimoId = $this->o_tipoEnderecoDAO->cadastrar($this->o_tipoEndereco);
	}

	function atualizar(){
		$this->o_tipoEnderecoDAO->atualizar($this->o_tipoEndereco);
	}

	function deletar(){
		$this->o_tipoEnderecoDAO->deletar($this->o_tipoEndereco);
	}

	function buscarPorId(){
		return $this->o_tipoEnderecoDAO->buscarPorId($this->o_tipoEndereco);
	}

	function listarPorNome(){
		return $this->o_tipoEnderecoDAO->listarPorNome($this->o_tipoEndereco);
	}

	function listarTodos(){
		return $this->o_tipoEnderecoDAO->listarTodos();
	}

}