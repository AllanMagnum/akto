<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/EnderecoPF.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Cidade.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/CidadeControl.php';

class EnderecoPFDAO{
	private $con;
	private $sql;
	private $o_enderecoPF;
	private $v_o_enderecoPF = array();
	
	function __construct($con){
		$this->con = $con;
	}
	
	function cadastrar(EnderecoPF $o_enderecoPF){
		$this->sql = "insert into endereco_pf (tipo, logradouro, numero, complemento, bairro, cep, idcidade, idpessoafisica, dataCadastro, dataAtualizacao) " .			    
				     "values ('" . $o_enderecoPF->getTipoEndereco() . "', '" . $o_enderecoPF->getLogradouro() . "', '" . $o_enderecoPF->getNumero() . "'," .
				             "'" . $o_enderecoPF->getComplemento() . "', '" . $o_enderecoPF->getBairro() . "', '" . $o_enderecoPF->getCep() . "'," .
				             "'" . $o_enderecoPF->getOCidade()->getId() . "', '" . $o_enderecoPF->getOPessoaFisica()->getId()  . "', '" . $o_enderecoPF->getDataCadastro() . "', '" . $o_enderecoPF->getDataAtualizacao() .
		             "')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		return mysqli_insert_id($this->con);
	}
	
	function atualizar(EnderecoPF $o_enderecoPF){
		$this->sql = "update endereco_pf set tipo= '" . $o_enderecoPF->getOTipoEndereco()->getDescricao() . "', logradouro= '" . $o_enderecoPF->getLogradouro() . "', numero=  '" . $o_enderecoPF->getNumero() . "', " . 
		              "complemento = '" . $o_enderecoPF->getComplemento() . "', bairro= '" . $o_enderecoPF->getBairro() . "', cep= '" . $o_enderecoPF->getCep() . "', " .
		              "idcidade = '" . $o_enderecoPF->getOCidade()->getId() . "', idpessoafisica= '" . $o_enderecoPF->getOPessoaFisica()->getId() .  "', dataAtualizacao= '" . $o_enderecoPF->getDataAtualizacao() . "'" .
		             " where id='" . $o_enderecoPF->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}
	
	function deletar(EnderecoPF $o_enderecoPF){
		$this->sql = "delete from endereco_pf where idpessoafisica='" . $o_enderecoPF->getOPessoaFisica()->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}
	
	function listarPorPessoa(EnderecoPF $o_enderecoPF){
		$this->sql= "select * from endereco_pf where idpessoafisica=" . $o_enderecoPF->getOPessoaFisica()->getId();
		$query = mysqli_query($this->con, $this->sql);
			
		if (!$query) {
			die('Error: ' . mysqli_error($this->con));
		}
			
		while($row = mysqli_fetch_object($query)){
			$o_cidade = new Cidade();
			$o_cidade->setId($row->idcidade);
			$o_cidadeControl = new CidadeControl($o_cidade);
			$o_cidade = $o_cidadeControl->buscarPorId($o_enderecoPF->getId());
			
			$this->o_enderecoPF = new EnderecoPF($row->id, $row->tipo, $row->logradouro, $row->numero,
					$row->complemento, $row->bairro, $row->cep,	$o_enderecoPF->getOPessoaFisica(), $o_cidade, $row->datacadastro, $row->dataatualizacao);
			array_push($this->v_o_enderecoPF, $this->o_enderecoPF);
		}
		
		return $this->v_o_enderecoPF;
	}
	
}	
