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
	private $con;
	private $o_pessoaFisica;
	private $o_pessoaFisicaDAO;
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
		
		foreach ($this->o_pessoaFisica->getVOContatoPF() as $o_contatoPF){
			$o_contatoPF->setOPessoaFisica($this->o_pessoaFisica);
			$o_contatoPFControl = new ContatoPFControl($o_contatoPF);
			$o_contatoPFControl->cadastrar();
		}
		
		foreach ($this->o_pessoaFisica->getVODocumentoPF() as $o_documentoPF){
			$o_documentoPF->setOPessoaFisica($this->o_pessoaFisica);
			$o_documentoPFControl = new DocumentoPFControl($o_documentoPF);
			$o_documentoPFControl->cadastrar();
		}
		
	}
	
	function atualizar(){
		$this->pessoaFisicaDAO->atualizar($this->o_pessoaFisica);
		
		foreach ($this->o_pessoaFisica->getVOEnderecoPF() as $o_enderecoPF) {
			$o_enderecoPF->setOPessoaFisica($this->o_pessoaFisica);
			$o_enderecoPFControl = new EnderecoPFControl($o_enderecoPF);
			$o_enderecoPFControl->deletar();
			$o_enderecoPFControl->cadastrar();
		}
		
		foreach ($this->o_pessoaFisica->getVOContatoPF() as $o_contatoPF){
			$o_contatoPF->setOPessoaFisica($this->o_pessoaFisica);
			$o_contatoPFControl = new ContatoPFControl($o_contatoPF);
			$o_contatoPFControl->deletar();
			$o_contatoPFControl->cadastrar();
		}
		
		foreach ($this->o_pessoaFisica->getVODocumentoPF() as $o_documentoPF){
			$o_documentoPF->setOPessoaFisica($this->o_pessoaFisica);
			$o_documentoPFControl = new DocumentoPFControl($o_documentoPF);
			$o_documentoPFControl->deletar();
			$o_documentoPFControl->cadastrar();
		}
	}
	
	function deletar(){
		
		foreach ($this->o_pessoaFisica->getVOEnderecoPF() as $o_enderecoPF) {
			$o_enderecoPF->setOPessoaFisica($this->o_pessoaFisica);
			$o_enderecoPFControl = new EnderecoPFControl($o_enderecoPF);
			$o_enderecoPFControl->deletar();
		}
		
		foreach ($this->o_pessoaFisica->getVOContatoPF() as $o_contatoPF){
			$o_contatoPF->setOPessoaFisica($this->o_pessoaFisica);
			$o_contatoPFControl = new ContatoPFControl($o_contatoPF);
			$o_contatoPFControl->deletar();
		}
		
		foreach ($this->o_pessoaFisica->getVODocumentoPF() as $o_documentoPF){
			$o_documentoPF->setOPessoaFisica($this->o_pessoaFisica);
			$o_documentoPFControl = new DocumentoPFControl($o_documentoPF);
			$o_documentoPFControl->deletar();
		}
		
		$this->pessoaFisicaDAO->deletar($this->o_pessoaFisica);
	}
	
	function buscarPorId(){
		$v_o_documentoPF = array();
		$v_o_enderecoPF = array();
		$v_o_contatoPF = array();
		
		$o_enderecoPF = new EnderecoPF();
		$o_enderecoPF->setOPessoaFisica($this->o_pessoaFisica);
		$o_enderecoPFControl = new EnderecoPFControl($o_enderecoPF);
		$v_o_enderecoPF = $o_enderecoPFControl->listarPorPessoa();
		$this->o_pessoaFisica->setVODocumentoPF($v_o_enderecoPF);
		
		$o_contatoPF = new ContatoPF();
		$o_contatoPF->setOPessoaFisica($this->o_pessoaFisica);
		$o_contatoPFControl = new ContatoPFControl($o_contatoPF);
		$v_o_contatoPF = $o_contatoPFControl->listarPorPessoa();
		$this->o_pessoaFisica->setVOContato($v_o_contatoPF);
		
		$o_documentoPF = new DocumentoPF();
		$o_documentoPF->setOPessoaFisica($this->o_pessoaFisica);
		$o_documentoPFControl = new DocumentoPFControl($o_documentoPF);
		$v_o_documentoPF = $o_documentoPFControl->listarPorPessoa();
		$this->o_pessoaFisica->setVODocumentoPF($v_o_documentoPF);
		
		return $this->pessoaFisicaDAO->buscarPorId($this->o_pessoaFisica);
	}
	
	function buscarPorNome(){
		$v_o_documentoPF = array();
		$v_o_enderecoPF = array();
		$v_o_contatoPF = array();
		
		$o_enderecoPF = new EnderecoPF();
		$o_enderecoPF->setOPessoaFisica($this->o_pessoaFisica);
		$o_enderecoPFControl = new EnderecoPFControl($o_enderecoPF);
		$v_o_enderecoPF = $o_enderecoPFControl->listarPorPessoa();
		$this->o_pessoaFisica->setVODocumentoPF($v_o_enderecoPF);
		
		$o_contatoPF = new ContatoPF();
		$o_contatoPF->setOPessoaFisica($this->o_pessoaFisica);
		$o_contatoPFControl = new ContatoPFControl($o_contatoPF);
		$v_o_contatoPF = $o_contatoPFControl->listarPorPessoa();
		$this->o_pessoaFisica->setVOContato($v_o_contatoPF);
		
		$o_documentoPF = new DocumentoPF();
		$o_documentoPF->setOPessoaFisica($this->o_pessoaFisica);
		$o_documentoPFControl = new DocumentoPFControl($o_documentoPF);
		$v_o_documentoPF = $o_documentoPFControl->listarPorPessoa();
		$this->o_pessoaFisica->setVODocumentoPF($v_o_documentoPF);
		
		return $this->pessoaFisicaDAO->buscarPorNome($this->o_pessoaFisica);
	}
	
	function listarPaginado($start, $limit){
		$v_o_documentoPF = array();
		$v_o_enderecoPF = array();
		$v_o_contatoPF = array();
		
// 		$o_enderecoPF = new EnderecoPF();
// 		$o_enderecoPF->setOPessoaFisica($this->o_pessoaFisica);
// 		$o_enderecoPFControl = new EnderecoPFControl($o_enderecoPF);
// 		$v_o_enderecoPF = $o_enderecoPFControl->listarPorPessoa();
// 		$this->o_pessoaFisica->setVODocumentoPF($v_o_enderecoPF);
		
// 		$o_contatoPF = new ContatoPF();
// 		$o_contatoPF->setOPessoaFisica($this->o_pessoaFisica);
// 		$o_contatoPFControl = new ContatoPFControl($o_contatoPF);
// 		$v_o_contatoPF = $o_contatoPFControl->listarPorPessoa();
// 		$this->o_pessoaFisica->setVOContato($v_o_contatoPF);
		
// 		$o_documentoPF = new DocumentoPF();
// 		$o_documentoPF->setOPessoaFisica($this->o_pessoaFisica);
// 		$o_documentoPFControl = new DocumentoPFControl($o_documentoPF);
// 		$v_o_documentoPF = $o_documentoPFControl->listarPorPessoa();
// 		$this->o_pessoaFisica->setVODocumentoPF($v_o_documentoPF);
		
		return $this->pessoaFisicaDAO->listarPaginado($start, $limit);
	}
	
	function qtdTotal(){
		return $this->pessoaFisicaDAO->qtdTotal();
	}

}
?>