<?php
class ContatoPfDAO{
	private $con;
	private $sql;
	private $v_o_contatoPF = array();
	
	function __construct($con){
		$this->con = $con;
	}
	
	function cadastrar($o_contatoPF){
		$this->sql = "insert into contato_pf (tipo, operadora, contato, idpessoa, dataCadastro, dataAtualizacao) " .			    
				     "values ('" . $o_contatoPF->getOTipocontato()->getDescricao() . "', '" . $o_contatoPF->getOOperadoracontato()->getDescricao() . "', '" . 
				               "', '" . $o_contatoPF->getContato() . "', '" . $o_contatoPF->getOPessoa()->getId() . "'," . $o_contatoPF->getDataCadastro() . "', '" . $o_contatoPF->getDataAtualizacao() . "')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function atualizar($o_contatoPF){
		$this->sql = "update contato_pf set tipo= '" . $o_contatoPF->getOTipocontato()->getDescricao() . "', operadora= '" . $o_contatoPF->getOOperadoracontato()->getDescricao() . "', contato=  '" . $o_contatoPF->getContato() . "', " . 
		             "', idpessoa= '" . $o_contatoPF->getOPessoa()->getId() .  "', dataAtualizacao= '" . $o_contatoPF->getDataAtualizacao() . "'" .
		             " where id='" . $o_contatoPF->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function deletar($o_contatoPF){
		$this->sql = "delete from contato_pf where id='" . $o_contatoPF->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function listarPorPessoa($o_contatoPF, $start, $limit){
		mysqli_set_charset($this->con, "utf8");
			
		$this->sql= "select * from contato_pf WHERE idpessoa=" . $o_contatoPF->getOPessoaFisica()->getId()  . " limit " . $start . ", " . $limit;
		$query = mysqli_query($this->con, $this->sql);
			
		if (!$query) {
			die('Error: ' . mysqli_error($this->con));
		}
			
		while($row = mysqli_fetch_object($query)){
			$o_contatoPF = new EnderecoPf($row->id, $row->tipo, $row->operadora, $row->contato,$row->datacadastro, $row->dataatualizacao);
			array_push($this->v_o_contatoPF, $o_contatoPF);
		}
		return $this->v_o_contatoPF;
		mysqli_close($this->con);
	}
	

	function qtdTotal(){
		$this->sql= "select count(*) as quantidade from contato_pf";
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