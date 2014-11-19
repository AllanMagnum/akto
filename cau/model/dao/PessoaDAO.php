<?php
class PessoaDAO{
	private $con;
	private $sql;
	private $v_o_pessoa = array();
	
	function __construct($con){
		$this->con = $con;
	}
	
	function cadastrar($o_pessoa){
		$this->sql = "insert into pessoa (nome, telefonemovel, telefonefixo, telefoneadicional, email, emailadicional, " .
	                                     "logradouro, numero, complemento, bairro, cep, dataCadastro, dataAtualizacao) " .			    
				     "values ('" . $o_pessoa->getNome() . "', '" . $o_pessoa->getTelefoneMovel() . "', '" . $o_pessoa->getTelefoneFixo() . "'," .
				             "'" . $o_pessoa->getTelefoneAdicional() . "', '" . $o_pessoa->getEmail() . "', '" . $o_pessoa->getEmailAdicional() . "'," .
				             "'" . $o_pessoa->getLogradouro() . "', '" . $o_pessoa->getNumero() . "', '" . $o_pessoa->getComplemento() . "'," .
				             "'" . $o_pessoa->getBairro() . "', '" . $o_pessoa->getCep() . "', '" . $o_pessoa->getDataCadastro() . "', '" . $o_pessoa->getDataAtualizacao() .
		             "')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function atualizar($o_pessoa){
		$this->sql = "update pessoa set nome= '" . $o_pessoa->getNome() . "', telefonemovel= '" . $o_pessoa->getTelefoneMovel() . "', telefonefixo=  '" . $o_pessoa->getTelefoneFixo() . "', " . 
		              "telefoneadicional = '" . $o_pessoa->getTelefoneAdicional() . "', email= '" . $o_pessoa->getEmail() . "', emailadicional= '" . $o_pessoa->getEmailAdicional() . "', " .
		              "logradouro = '" . $o_pessoa->getLogradouro() . "', numero= '" . $o_pessoa->getNumero() . "', complemento= '" . $o_pessoa->getComplemento() . "', " .
		              "bairro = '" . $o_pessoa->getBairro() . "', cep= '" . $o_pessoa->getCep() . "', dataAtualizacao= '" . $o_pessoa->getDataAtualizacao() . "'" .
		             " where id='" . $o_pessoa->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function deletar($o_pessoa){
		$this->sql = "delete from pessoa where id='" . $o_pessoa->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function listarPaginado($start, $limit){
		mysqli_set_charset($this->con, "utf8");
			
		$this->sql= "select * from pessoa limit " . $start . ", " . $limit;
		$query = mysqli_query($this->con, $this->sql);
			
		if (!$query) {
			die('Error: ' . mysqli_error($this->con));
		}
			
		while($row = mysqli_fetch_object($query)){
			$o_pessoa = new Pessoa($row->id, $row->nome, $row->telefonemovel, $row->telefonefixo,
					$row->telefoneadicional, $row->email, $row->emailadicional, $row->logradouro,
					$row->numero, $row->complemento, $row->bairro, $row->cep,
					$row->datacadastro, $row->dataatualizacao);
			array_push($this->v_o_pessoa, $o_pessoa);
		}
		return $this->v_o_pessoa;
		mysqli_close($this->con);
	}
	
	function buscarPorId($o_pessoa){
		$this->sql= "select * from pessoa where id= '" . $o_pessoa->getId() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_pessoa = new Pessoa($row->id, $row->nome, $row->telefonemovel, $row->telefonefixo,
					               $row->telefoneadicional, $row->email, $row->emailadicional, $row->logradouro,
					               $row->numero, $row->complemento, $row->bairro, $row->cep,
					               $row->datacadastro, $row->dataatualizacao);
			return $o_pessoa;
		}
		
		mysqli_close($this->con);
	}
	
	function buscarPorNome($o_pessoa){
		$this->sql= "select * from pessoa where nome like '" . $o_pessoa->getNome() . "%'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_pessoa = new Pessoa($row->id, $row->nome, $row->telefonemovel, $row->telefonefixo,
					$row->telefoneadicional, $row->email, $row->emailadicional, $row->logradouro,
					$row->numero, $row->complemento, $row->bairro, $row->cep,
					$row->datacadastro, $row->dataatualizacao);
			array_push($this->v_o_pessoa, $o_pessoa);
		}
		return $this->v_o_pessoa;
		mysqli_close($this->con);
	}
	
	function qtdTotal(){
		$this->sql= "select count(*) quantidade from pessoa";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			return $row->quantidade;
		}
		
		mysqli_close($this->con);
	}
	
}	
?>