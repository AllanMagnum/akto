<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/EnderecoPF.php';

class EnderecoPFDAO{
	private $con;
	private $sql;
	private $o_enderecoPF;
	private $v_o_enderecoPF = array();
	
	function __construct($con){
		$this->con = $con;
	}
	
	function cadastrar(EnderecoPF $o_enderecoPF){
		$this->sql = "insert into endereco_pf (tipo, logradouro, numero, complemento, bairro, cep, idcidade, idpessoa, dataCadastro, dataAtualizacao) " .			    
				     "values ('" . $o_enderecoPF->getOTipoEndereco()->getDescricao() . "', '" . $o_enderecoPF->getLogradouro() . "', '" . $o_enderecoPF->getNumero() . "'," .
				             "'" . $o_enderecoPF->getComplemento() . "', '" . $o_enderecoPF->getBairro() . "', '" . $o_enderecoPF->getCep() . "'," .
				             "'" . $o_enderecoPF->getOCidade()->getId() . "', '" . $o_enderecoPF->getOPessoaFisica()->getId()  . "', '" . $o_enderecoPF->getDataCadastro() . "', '" . $o_enderecoPF->getDataAtualizacao() .
		             "')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function atualizar(EnderecoPF $o_enderecoPF){
		$this->sql = "update endereco_pf set tipo= '" . $o_enderecoPF->getOTipoEndereco()->getDescricao() . "', logradouro= '" . $o_enderecoPF->getLogradouro() . "', numero=  '" . $o_enderecoPF->getNumero() . "', " . 
		              "complemento = '" . $o_enderecoPF->getComplemento() . "', bairro= '" . $o_enderecoPF->getBairro() . "', cep= '" . $o_enderecoPF->getCep() . "', " .
		              "idcidade = '" . $o_enderecoPF->getOCidade()->getId() . "', idpessoa= '" . $o_enderecoPF->getOPessoaFisica()->getId() .  "', dataAtualizacao= '" . $o_enderecoPF->getDataAtualizacao() . "'" .
		             " where id='" . $o_enderecoPF->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function deletar(EnderecoPF $o_enderecoPF){
		$this->sql = "delete from endereco_pf where id='" . $o_enderecoPF->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function listarPaginadoPorPessoa(EnderecoPF $o_enderecoPF, $start, $limit){
		mysqli_set_charset($this->con, "utf8");
			
		$this->sql= "select * from endereco_pf WHERE idpessoa=" . $o_enderecoPF->getOPessoaFisica()->getId()  . " limit " . $start . ", " . $limit;
		$query = mysqli_query($this->con, $this->sql);
			
		if (!$query) {
			die('Error: ' . mysqli_error($this->con));
		}
			
		while($row = mysqli_fetch_object($query)){
			$this->o_enderecoPF = new EnderecoPF($row->id, $row->tipo, $row->logradouro, $row->numero,
					$row->complemento, $row->bairro, $row->cep,	$row->datacadastro, $row->dataatualizacao);
			array_push($this->v_o_enderecoPF, $this->o_enderecoPF);
		}
		return $this->v_o_enderecoPF;
		mysqli_close($this->con);
	}
	

	function qtdTotalPorPessoa(EnderecoPF $o_enderecoPF){
		$this->sql= "select count(*) as quantidade from endereco_pf WHERE idpessoa=" . $o_enderecoPF->getOPessoaFisica()->getId()  ;
		$st_query = mysqli_query($this->con, $this->sql);
		
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		
		$total = 0;
		while($row = mysqli_fetch_object($st_query)){
			$total = $row->quantidade;
		}
		
		return $total;
		
		mysqli_close($this->con);
	}
	
}	
