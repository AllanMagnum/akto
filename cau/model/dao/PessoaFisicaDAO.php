<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/PessoaFisica.php';

class PessoaFisicaDAO{
	private $con;
	private $sql;
	private $o_pessoaFisisca;
	private $v_o_pessoaFisica = array();
	
	function __construct($con){
		$this->con = $con;
	}
	
	function cadastrar(PessoaFisica $o_pessoaFisica){
		$this->sql = "insert into pessoafisica (nome, cpf, datanascimento, estadocivil, sexo, nomepai, " .
	                                     "nomemae, cor, naturalidade, nacionalidade, dataCadastro, dataAtualizacao) " .			    
				     "values ('" . $o_pessoaFisica->getNome() . "', '" . $o_pessoaFisica->getCpf() . "', '" . $o_pessoaFisica->getDataNascimento() . "', '" . $o_pessoaFisica->getEnumEstadoCivil() . "'," .
				             "'" . $o_pessoaFisica->getEnumSexo() . "', '" . $o_pessoaFisica->getNomePai() . "', '" . $o_pessoaFisica->getNomeMae() . "'," .
				             "'" . $o_pessoaFisica->getEnumCor() . "', '" . $o_pessoaFisica->getNaturalidade() . "', '" . $o_pessoaFisica->getNacionalidade() . "'," .
				             "'" . $o_pessoaFisica->getDataCadastro() . "', '" . $o_pessoaFisica->getDataAtualizacao() .
		             "')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		
		return mysqli_insert_id($this->con);
	}
	
	function cadastrarEndereco(PessoaFisica $o_pessoaFisica){
		foreach ($o_pessoaFisica->getVOEndereco() as $o_enderecoPF) {
			$this->sql = "insert into endereco_pf (tipo, logradouro, numero, complemento, bairro, cep, idcidade, idpessoa, dataCadastro, dataAtualizacao) " .
					     "values ('" . $o_enderecoPF->getOTipoEndereco()->getDescricao() . "', '" . $o_enderecoPF->getLogradouro() . "', '" . $o_enderecoPF->getNumero() . "'," .
				         "'" . $o_enderecoPF->getComplemento() . "', '" . $o_enderecoPF->getBairro() . "', '" . $o_enderecoPF->getCep() . "'," .
				         "'" . $o_enderecoPF->getOCidade()->getId() . "', '" . $o_enderecoPF->getOPessoaFisica()->getId()  . "', '" . $o_enderecoPF->getDataCadastro() . "', '" . $o_enderecoPF->getDataAtualizacao() .
				         "')";
		    if (!mysqli_query($this->con, $this->sql)) {
				die('Error: ' . mysqli_error($this->con));
			}
		}
	}
	
	function atualizar(PessoaFisica $o_pessoaFisica){
		$this->sql = "update pessoafisica set nome= '" . $o_pessoaFisica->getNome() . "', cpf= '" . $o_pessoaFisica->getCpf() . "', datanascimento=  '" . $o_pessoaFisica->getDataNascimento() . "', " . 
		              "estadocivil = '" . $o_pessoaFisica->getEnumEstadoCivil() . "', sexo= '" . $o_pessoaFisica->getEnumSexo() . "', nomePai= '" . $o_pessoaFisica->getNomePai() . "', " .
		              "nomeMae = '" . $o_pessoaFisica->getNomeMae() . "', cor= '" . $o_pessoaFisica->getEnumCor() . "', naturalidade= '" . $o_pessoaFisica->getNaturalidade() . "', " .
		              "nacionalidade = '" . $o_pessoaFisica->getNacionalidade() . "'" .
		             " where id='" . $o_pessoaFisica->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}
	
	function deletar(PessoaFisica $o_pessoaFisica){
		$this->sql = "delete from pessoafisica where id='" . $o_pessoaFisica->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}
	
	function listarPaginado($start, $limit){
			
		$this->sql= "select * from pessoafisica limit " . $start . ", " . $limit;
		$query = mysqli_query($this->con, $this->sql);
			
		if (!$query) {
			die('Error: ' . mysqli_error($this->con));
		}
			
		while($row = mysqli_fetch_object($query)){
			$o_pessoaFisica = new PessoaFisica($row->id, $row->nome, $row->cpf, $row->datanascimento, $row->estadocivil, $row->sexo,
					$row->nomepai, $row->nomemae, $row->cor, $row->naturalidade,
					$row->nacionalidade, $row->datacadastro, $row->dataatualizacao);
			array_push($this->v_o_pessoaFisica, $o_pessoaFisica);
		}
		return $this->v_o_pessoaFisica;
	}
	
	function buscarPorId(PessoaFisica $o_pessoaFisica){
		$this->sql= "select * from pessoafisica where id= '" . $o_pessoaFisica->getId() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_pessoaFisica = new PessoaFisica($row->id, $row->nome, $row->cpf, $row->datanascimento, $row->estadocivil, $row->sexo,
											   $row->nomepai, $row->nomemae, $row->cor, $row->naturalidade,
											   $row->nacionalidade, $row->datacadastro, $row->dataatualizacao);
			return $o_pessoaFisica;
		}
	}
	
	function buscarPorNome(PessoaFisica $o_pessoaFisica){
		$this->sql= "select * from pessoafisica where nome like '" . $o_pessoaFisica->getNome() . "%'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_pessoaFisica = new PessoaFisica($row->id, $row->nome, $row->cpf, $row->datanascimento, $row->estadocivil, $row->sexo,
					$row->nomepai, $row->nomemae, $row->cor, $row->naturalidade,
					$row->nacionalidade, $row->datacadastro, $row->dataatualizacao);
			
			$v_o_documentoPF = array();
			$v_o_enderecoPF = array();
			$v_o_contatoPF = array();
			
			$o_enderecoPF = new EnderecoPF();
			$o_enderecoPF->setOPessoaFisica($o_pessoaFisica);
			$o_enderecoPFControl = new EnderecoPFControl($o_enderecoPF);
			$v_o_enderecoPF = $o_enderecoPFControl->listarPorPessoa();
			$o_pessoaFisica->setVODocumentoPF($v_o_enderecoPF);
			
			$o_contatoPF = new ContatoPF();
			$o_contatoPF->setOPessoaFisica($o_pessoaFisica);
			$o_contatoPFControl = new ContatoPFControl($o_contatoPF);
			$v_o_contatoPF = $o_contatoPFControl->listarPorPessoa();
			$o_pessoaFisica->setVOContato($v_o_contatoPF);
			
			$o_documentoPF = new DocumentoPF();
			$o_documentoPF->setOPessoaFisica($o_pessoaFisica);
			$o_documentoPFControl = new DocumentoPFControl($o_documentoPF);
			$v_o_documentoPF = $o_documentoPFControl->listarPorPessoa();
			$o_pessoaFisica->setVODocumentoPF($v_o_documentoPF);
			
			array_push($this->v_o_pessoaFisica, $o_pessoaFisica);
		}
		return $this->v_o_pessoaFisica;
	}
	
	function qtdTotal(){
		$this->sql= "select count(*) as quantidade from pessoafisica";
		$st_query = mysqli_query($this->con, $this->sql);
		
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		
		$total = 0;
		while($row = mysqli_fetch_object($st_query)){
			$total = $row->quantidade;
		}
		
		return $total;
	}
	
}	

