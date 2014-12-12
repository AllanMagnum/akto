<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/PessoaFisicaDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/PessoaFisica.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/EnderecoPF.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/ContatoPF.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/DocumentoPF.php';

class PessoaFisicaControl{
	protected $con;
	protected $o_pessoaFisica;
	protected $o_pessoaFisicaDAO;
	private $ultimoId;
	
	function __construct($o_pessoa=""){
		$conexao = new Conexao();
		$this->con = $conexao->getConnection();
		$this->pessoaFisicaDAO = new PessoaFisicaDAO($this->con);
		$this->o_pessoaFisica = $o_pessoa;
	}
	
	public function getUltimoId() {
		return $this->ultimoId;
	}
	
	function cadastrar(){
		$this->ultimoId = $this->pessoaFisicaDAO->cadastrar($this->o_pessoaFisica);
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
	
	function adicionarEndereco($o_endereco){
		array_push($this->o_pessoaFisica->getVOEndereco(), $o_endereco);
	}
	
	function adicionarContato($o_contato){
		array_push($this->o_pessoaFisica->getVOEndereco(), $o_contato);
	}
	
	function adicionar($o_documento){
		array_push($this->o_pessoaFisica->getVODocumento(), $o_documento);
	}
	
}
?>