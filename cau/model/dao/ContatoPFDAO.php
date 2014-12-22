<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/ContatoPF.php';

class ContatoPFDAO{
	private $con;
	private $sql;
	private $o_contatoPF;
	private $v_o_contatoPF = array();
	
	function __construct($con){
		$this->con = $con;
	}
	
	function cadastrar(ContatoPF $o_contatoPF){
		
		$this->sql = "insert into contato_pf (tipo, operadora, contato, idpessoafisica, dataCadastro, dataAtualizacao) " .			    
				     "values ('" . $o_contatoPF->getOTipocontato()->getDescricao() . "', '" . $o_contatoPF->getOOperadoracontato()->getDescricao() .
				               "', '" . $o_contatoPF->getContato() . "', '" . $o_contatoPF->getOPessoaFisica()->getId() . "', '" . $o_contatoPF->getDataCadastro() . "', '" . $o_contatoPF->getDataAtualizacao() . "')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	
	}
	
	function atualizar(ContatoPF $o_contatoPF){
		$this->sql = "update contato_pf set tipo= '" . $o_contatoPF->getOTipocontato()->getDescricao() . "', operadora= '" . $o_contatoPF->getOOperadoracontato()->getDescricao() . "', contato=  '" . $o_contatoPF->getContato() . "', " . 
		             "', idpessoafisica= '" . $o_contatoPF->getOPessoaFisica()->getId() .  "', dataAtualizacao= '" . $o_contatoPF->getDataAtualizacao() . "'" .
		             " where id='" . $o_contatoPF->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}
	
	function deletar(ContatoPF $o_contatoPF){
		$this->sql = "delete from contato_pf where idpessoafisica'" . $o_contatoPF->getOPessoaFisica()->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}
	
	function listarPorPessoa(ContatoPF $o_contatoPF){
			
		$this->sql= "select * from contato_pf WHERE idpessoafisica=" . $o_contatoPF->getOPessoaFisica()->getId() ;
		$query = mysqli_query($this->con, $this->sql);
			
		if (!$query) {
			die('Error: ' . mysqli_error($this->con));
		}
			
		while($row = mysqli_fetch_object($query)){
			$this->o_contatoPF = new EnderecoPF($row->id, $row->tipo, $row->operadora, $row->contato,$row->datacadastro, $row->dataatualizacao);
			array_push($this->v_o_contatoPF, $this->o_contatoPF);
		}
		return $this->v_o_contatoPF;
	}
	
}	
?>