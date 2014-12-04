<?php
class PessoaFisicaDAO{
	private $con;
	private $sql;
	private $v_o_pessoaFisica = array();
	
	function __construct($con){
		$this->con = $con;
	}
	
	function cadastrar($o_pessoaFisica){
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
		mysqli_close($this->con);
	}
	
	function atualizar($o_pessoaFisica){
		$this->sql = "update pessoafisica set nome= '" . $o_pessoaFisica->getNome() . "', cpf= '" . $o_pessoaFisica->getCpf() . "', datanascimento=  '" . $o_pessoaFisica->getDataNascimento() . "', " . 
		              "estadocivil = '" . $o_pessoaFisica->getEnumEstadoCivil() . "', sexo= '" . $o_pessoaFisica->EnumgetSexo() . "', nomePai= '" . $o_pessoaFisica->getNomePai() . "', " .
		              "nomeMae = '" . $o_pessoaFisica->getNomeMae() . "', cor= '" . $o_pessoaFisica->getCor() . "', naturalidade= '" . $o_pessoaFisica->getNaturalidade() . "', " .
		              "nacionalidade = '" . $o_pessoaFisica->getNacionalidade() . "', dataAtualizacao= '" . $o_pessoaFisica->getDataAtualizacao() . "'" .
		             " where id='" . $o_pessoaFisica->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function deletar($o_pessoaFisica){
		$this->sql = "delete from pessoafisica where id='" . $o_pessoaFisica->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function listarPaginado($start, $limit){
			
		$this->sql= "select * from pessoafisica limit " . $start . ", " . $limit;
		$query = mysqli_query($this->con, $this->sql);
			
		if (!$query) {
			die('Error: ' . mysqli_error($this->con));
		}
			
		while($row = mysqli_fetch_object($query)){
			$o_pessoaFisica = new PessoaFisica($row->id, $row->nome, $row->cpf, $row->dataNascimento, $row->estadocivil, $row->sexo,
					$row->nomepai, $row->nomemae, $row->cor, $row->naturalidade,
					$row->nacionalidade, $row->datacadastro, $row->dataatualizacao);
			array_push($this->v_o_pessoaFisica, $o_pessoaFisica);
		}
		return $this->v_o_pessoaFisica;
		mysqli_close($this->con);
	}
	
	function buscarPorId($o_pessoaFisica){
		$this->sql= "select * from pessoafisica where id= '" . $o_pessoaFisica->getId() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_pessoaFisica = new PessoaFisica($row->id, $row->nome, $row->cpf, $row->dataNascimento, $row->estadocivil, $row->sexo,
					$row->nomepai, $row->nomemae, $row->cor, $row->naturalidade,
					$row->nacionalidade, $row->datacadastro, $row->dataatualizacao);
			return $o_pessoaFisica;
		}
		
		mysqli_close($this->con);
	}
	
	function buscarPorNome($o_pessoaFisica){
		$this->sql= "select * from pessoafisica where nome like '" . $o_pessoaFisica->getNome() . "%'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_pessoaFisica = new PessoaFisica($row->id, $row->nome, $row->cpf, $row->dataNascimento, $row->estadocivil, $row->sexo,
					$row->nomepai, $row->nomemae, $row->cor, $row->naturalidade,
					$row->nacionalidade, $row->datacadastro, $row->dataatualizacao);
			array_push($this->v_o_pessoaFisica, $o_pessoaFisica);
		}
		return $this->v_o_pessoaFisica;
		mysqli_close($this->con);
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
		
		mysqli_close($this->con);
	}
	
}	
?>