<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/PessoaFisicaDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/PessoaFisica.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/EnderecoPF.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/EnderecoPFControl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/ContatoPF.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/ContatoPFControl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/DocumentoPF.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/DocumentoPFControl.php';

class PessoaFisicaControl{
	protected $con;
	protected $o_pessoaFisica;
	protected $o_pessoaFisicaDAO;
	private $ultimoId;
	
	function __construct(PessoaFisica $o_pessoaFisica= null){
		$this->con = Conexao::getInstance()->getConexao();
		$this->pessoaFisicaDAO = new PessoaFisicaDAO($this->con);
		$this->o_pessoaFisica = $o_pessoaFisica;
	}
	
	public function getUltimoId() {
		return $this->ultimoId;
	}
	
	function cadastrar(){
		$this->ultimoId = $this->pessoaFisicaDAO->cadastrar($this->o_pessoaFisica);
		
		$this->o_pessoaFisica->setId($this->ultimoId);
		
		foreach ($this->o_pessoaFisica->getVOEnderecoPF() as $o_enderecoPF) {
			$o_enderecoPF->setOPessoaFisica($this->o_pessoaFisica);
			$o_enderecoPFControl = new EnderecoPFControl($o_enderecoPF);
			$o_enderecoPFControl->cadastrar(); 
		}
	}
	
	function atualizar(){
		$this->pessoaFisicaDAO->atualizar($this->o_pessoaFisica);
	}
	
	function deletar(){
		$this->pessoaFisicaDAO->deletar($this->o_pessoaFisica);
	}
	
	function buscarPorId(){
		return $this->pessoaFisicaDAO->buscarPorId($this->o_pessoaFisica);
	}
	
	function buscarPorNome(){
		return $this->pessoaFisicaDAO->buscarPorNome($this->o_pessoaFisica);
	}
	
	function listarPaginado($start, $limit){
		return $this->pessoaFisicaDAO->listarPaginado($start, $limit);
	}
	
	function qtdTotal(){
		return $this->pessoaFisicaDAO->qtdTotal();
	}

}
?>