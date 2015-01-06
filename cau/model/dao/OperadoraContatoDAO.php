<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/OperadoraContato.php';

class OperadoraContatoDAO{
	private $con;
	private $sql;
	private $o_operadoraContato;
	private $v_o_operadoraContato = array();
	
	function __construct($con){
		$this->con = $con;
	}
	
	function cadastrar(OperadoraContato $o_operadoraContato){
		$this->sql = "insert into operadora_contato (descricao, dataCadastro, dataAtualizacao) " .
				"values ('" . $o_operadoraContato->getDescricao() . "', '" . $o_operadoraContato->getDataCadastro() . "', '" . $o_operadoraContato->getDataAtualizacao() . "')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		return mysqli_insert_id($this->con);
	}
	
	function atualizar(OperadoraContato $o_operadoraContato){
		$this->sql = "update operadora_contato set descricao= '" . $o_operadoraContato->getDescricao() . "', datacadastro= '" . $o_operadoraContato->getDataCadastro() . "', dataatualizacao= '" . $o_operadoraContato->getDataAtualizacao() . "'" .
				" where id='" . $o_operadoraContato->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}
	
	function deletar(OperadoraContato $o_operadoraContato){
		$this->sql = "delete from operadora_contato where id='" . $o_operadoraContato->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}
	
	function buscarPorId(OperadoraContato $o_operadoraContato){
		$this->sql= "select * from operadora_contato where id= '" . $o_operadoraContato->getId() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$this->o_operadoraContato = new OperadoraContato($row->id, $row->descricao, $row->datacadastro, $row->dataatualizacao);
		}
	
		return $this->o_operadoraContato;
	}
	
	function listarTodos(){
		$this->sql= "select * from operadora_contato" ;
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$this->o_operadoraContato = new OperadoraContato($row->id, $row->descricao, $row->datacadastro, $row->dataatualizacao);
	
			array_push($this->v_o_operadoraContato, $this->o_operadoraContato);
		}
	
		return $this->v_o_operadoraContato;
	}
	
	function listarPorNome(OperadoraContato $o_operadoraContato){
		$this->sql= "select * from operadora_contato where nome like '" . $o_operadoraContato->getDescricao() . "%'" ;
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$this->o_operadoraContato = new OperadoraContato($row->id, $row->descricao, $row->datacadastro, $row->dataatualizacao);
	
			array_push($this->v_o_operadoraContato, $this->o_operadoraContato);
		}
	
		return $this->v_o_operadoraContato;
	}	
}