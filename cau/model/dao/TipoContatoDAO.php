<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/TipoContato.php';

class TipoContatoDAO{
	private $con;
	private $sql;
	private $o_tipoContato;
	private $v_o_tipoContato = array();
	
	function __construct($con){
		$this->con = $con;
	}
	
	function cadastrar(TipoContato $o_tipoContato){
		$this->sql = "insert into tipo_contato (descricao, dataCadastro, dataAtualizacao) " .
				"values ('" . $o_tipoContato->getDescricao() . "', '" . $o_tipoContato->getDataCadastro() . "', '" . $o_tipoContato->getDataAtualizacao() . "')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}
	
	function atualizar(TipoContato $o_tipoContato){
		$this->sql = "update tipo_contato set descricao= '" . $o_tipoContato->getDescricao() . "', datacadastro= '" . $o_tipoContato->getDataCadastro() . "', dataatualizacao= '" . $o_tipoContato->getDataAtualizacao() . "'" .
				" where id='" . $o_tipoContato->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}
	
	function deletar(TipoContato $o_tipoContato){
		$this->sql = "delete from tipo_contato where id='" . $o_tipoContato->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}
	
	function buscarPorId(TipoContato $o_tipoContato){
		$this->sql= "select * from tipo_contato where id= '" . $o_tipoContato->getId() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$this->o_tipoContato = new TipoContato($row->id, $row->descricao, $row->datacadastro, $row->dataatualizacao);
		}
	
		return $this->o_tipoContato;
	}
	
	function listarTodos(){
		$this->sql= "select * from tipo_contato" ;
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$this->o_tipoContato = new TipoContato($row->id, $row->descricao, $row->datacadastro, $row->dataatualizacao);
	
			array_push($this->v_o_tipoContato, $this->o_tipoContato);
		}
	
		return $this->v_o_tipoContato;
	}
	
	function listarPorNome(TipoContato $o_tipoContato){
		$this->sql= "select * from tipo_contato where nome like '" . $o_tipoContato->getDescricao() . "%'" ;
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$this->o_tipoContato = new TipoContato($row->id, $row->descricao, $row->datacadastro, $row->dataatualizacao);
	
			array_push($this->v_o_tipoContato, $this->o_tipoContato);
		}
	
		return $this->v_o_tipoContato;
	}
}