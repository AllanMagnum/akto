<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/TipoContato.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/TipoContatoDAO.php';

class TipoContatoControl{
	protected $con;
	protected $o_tipoContato;
	protected $o_tipoContatoDAO;
	private $ultimoId;
	
	function __construct(TipoContato $o_tipoContato= null){
		$this->con = Conexao::getInstance()->getConexao();
		$this->o_tipoContatoDAO = new TipoContatoDAO($this->con);
		$this->o_tipoContato = $o_tipoContato;
	}
	
	public function getUltimoId() {
		return $this->ultimoId;
	}
	
	function cadastrar(){
		$this->ultimoId = $this->o_tipoContatoDAO->cadastrar($this->o_tipoContato);
	}
	
	function atualizar(){
		$this->o_tipoContatoDAO->atualizar($this->o_tipoContato);
	}
	
	function deletar(){
		$this->o_tipoContatoDAO->deletar($this->o_tipoContato);
	}
	
	function buscarPorId(){
		return $this->o_tipoContatoDAO->buscarPorId($this->o_tipoContato);
	}
	
	function listarPorNome(){
		return $this->o_tipoContatoDAO->listarPorNome($this->o_tipoContato);
	}
	
	function listarTodos(){
		return $this->o_tipoContatoDAO->listarTodos();
	}
	
}