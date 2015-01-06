<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/PessoaFisicaControl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/PessoaFisica.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/DocumentoPF.php';

class DocumentoPFDAO{
	private $con;
	private $sql;
	private $o_documentoPF;
	private $v_o_documentoPF = array();

	function __construct($con){
		$this->con = $con;
	}

	function cadastrar(DocumentoPF $o_documentoPF){
		$this->sql = "insert into documentos_pf (tipo, numero, dataemissao, orgaoemissor, via, idpessoafisica, datacadastro, dataatualizacao) " .
				"values ('" . $o_documentoPF->getEnumTipo() . "', '" . $o_documentoPF->getNumero() .  "', '" . $o_documentoPF->getDataEmissao() . "', '" . $o_documentoPF->getOrgaoEmissor() . "', '" . $o_documentoPF->getVia() . "', '" . $o_documentoPF->getOPessoaFisica()->getId() . "', '" . $o_documentoPF->getDataCadastro() . "', '" . $o_documentoPF->getDataAtualizacao() . "')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		return mysqli_insert_id($this->con);
	}

	function atualizar(DocumentoPF $o_documentoPF){
		$this->sql = "update documentos_pf set tipo= '" . $o_documentoPF->getEnumTipo() . "', numero= '" . $o_documentoPF->getNumero() . "', dataEmissao= '" . $o_documentoPF->getDataEmissao() . "', orgaoEmissor= '" . $o_documentoPF->getOrgaoEmissor() . "', via= '" . $o_documentoPF->getVia() . "', idpessoafisica= '" . $o_documentoPF->getOPessoaFisica()->getId() . "'" . "', dataCadastro= '" . $o_documentoPF->getDataCadastro() . "'" . "', idpessoafisica= '" . $o_documentoPF->getAtualizacao . "'" .
				" where id='" . $o_documentoPF->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}

	function deletar(DocumentoPF $o_documentoPF){
		$this->sql = "delete from documentos_pf where idpessoafisica='" . $o_documentoPF->getOPessoafisica()->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}

	function buscarPorId(DocumentoPF $o_documentoPF){
		$this->sql= "select * from documentos_pf where id= '" . $o_documentoPF->getId() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_pessoaFisica = new PessoaFisica();
			$o_pessoaFisica->setId($row->id);
			
			$o_pessoaFisicaControl = new PessoaFisicaControl($o_pessoaFisica);
			$o_pessoaFisica = $o_pessoaFisicaControl->buscarPorId();
			
			$this->o_documentoPF = new DocumentoPF($row->id, $row->tipo, $row->numero, $row->dataemissao, $row->orgaoemissor, $row->via, $o_pessoaFisica, $row->datacadastro, $row->dataatualizacao);
		}

		return $this->o_documentoPF;
	}
	
	function listarPorPessoa(DocumentoPF $o_documentoPF){
		$this->sql= "select * from documentos_pf where idpessoafisica= '" . $o_documentoPF->getOPessoaFisica()->getId() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_pessoaFisica = new PessoaFisica();
			$o_pessoaFisica->setId($row->id);
			
			$o_pessoaFisicaControl = new PessoaFisicaControl($o_pessoaFisica);
			$o_pessoaFisica = $o_pessoaFisicaControl->buscarPorId();
			
			$this->o_documentoPF = new DocumentoPF($row->id, $row->tipo, $row->numero, $row->dataemissao, $row->orgaoemissor, $row->via, $o_pessoaFisica, $row->datacadastro, $row->dataatualizacao);
			
			array_push($this->v_o_documentoPF, $this->o_documentoPF);
		}

		return $this->v_o_documentoPF;
	}
}
?>