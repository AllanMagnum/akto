<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/PessoaControl.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Pessoa.php';

class DocumentoPfDAO{
	private $con;
	private $sql;
	private $v_o_documentoPf = array();

	function __construct($con){
		$this->con = $con;
	}

	function cadastrar($o_documentoPf){
		$this->sql = "insert into documentos_pf (tipo, numero, dataemissao, orgaoemissor, via, idpessoa, datacadastro, dataatualizacao) " .
				"values ('" . $o_documentoPf->getEnumTipo() . "', '" . $o_documentoPf->getNumero() .  "', '" . $o_documentoPf->getDataEmissao() . "', '" . $o_documentoPf->getOrgaoEmissor() . "', '" . $o_documentoPf->getVia() . "', '" . $o_documentoPf->getPessoa()->getId() . "', '" . $o_documentoPf->getDataCadastro() . "', '" . $o_documentoPf->getDataAtualizacao() . "')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}

	function atualizar($o_documentoPf){
		$this->sql = "update documentos_pf set tipo= '" . $o_documentoPf->getEnumTipo() . "', numero= '" . $o_documentoPf->getNumero() . "', dataEmissao= '" . $o_documentoPf->getDataEmissao() . "', orgaoEmissor= '" . $o_documentoPf->getOrgaoEmissor() . "', via= '" . $o_documentoPf->getVia() . "', idpessoa= '" . $o_documentoPf->getPessoa()->getId() . "'" . "', dataCadastro= '" . $o_documentoPf->getDataCadastro() . "'" . "', idpessoa= '" . $o_documentoPf->getAtualizacao . "'" .
				" where id='" . $o_documentoPf->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}

	function deletar($o_documentoPf){
		$this->sql = "delete from documentos_pf where id='" . $o_documentoPf->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}

	function buscarPorId($o_documentoPf){
		$this->sql= "select * from documentos_pf where id= '" . $o_documentoPf->getId() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_pessoaFisica = new PessoaFisica();
			$o_pessoaFisica->setId($row->id);
			
			$o_pessoaFisicaControl = new PessoaFisicaControl($o_pessoaFisica);
			$o_pessoaFisica = $o_pessoaFisicaControl->buscarPorId();
			
			$o_documentoPf = new DocumentoPf($row->id, $row->tipo, $row->numero, $row->dataemissao, $row->orgaoemissor, $row->via, $o_pessoaFisica, $row->datacadastro, $row->dataatualizacao);
		}

		return $o_documentoPf;

		mysqli_close($this->con);
	}
	
	function listarPorPessoa($o_documentoPf){
		$this->sql= "select * from documentos_pf where idpessoa= '" . $o_documentoPf->getPessoa()->getId() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_pessoaFisica = new PessoaFisica();
			$o_pessoaFisica->setId($row->id);
			
			$o_pessoaFisicaControl = new PessoaFisicaControl($o_pessoaFisica);
			$o_pessoaFisica = $o_pessoaFisicaControl->buscarPorId();
			
			$o_documentoPf = new DocumentoPf($row->id, $row->tipo, $row->numero, $row->dataemissao, $row->orgaoemissor, $row->via, $o_pessoaFisica, $row->datacadastro, $row->dataatualizacao);
			
			array_push($this->v_o_documentosPf, $o_documentoPf);
		}

		return $this->v_o_documentosPf;

		mysqli_close($this->con);
	}
}
?>