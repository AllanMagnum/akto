<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/TipoEndereco.php';

class TipoEnderecoDAO{
	private $con;
	private $sql;
	private $o_tipoEndereco;
	private $v_o_tipoEndereco = array();

	function __construct($con){
		$this->con = $con;
	}

	function cadastrar(TipoEndereco $o_tipoEndereco){
		$this->sql = "insert into tipo_endereco (descricao, dataCadastro, dataAtualizacao) " .
				"values ('" . $o_tipoEndereco->getDescricao() . "', '" . $o_tipoEndereco->getDataCadastro() . "', '" . $o_tipoEndereco->getDataAtualizacao() . "')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}

	function atualizar(TipoEndereco $o_tipoEndereco){
		$this->sql = "update tipo_endereco set descricao= '" . $o_tipoEndereco->getDescricao() . "', datacadastro= '" . $o_tipoEndereco->getDataCadastro() . "', dataatualizacao= '" . $o_tipoEndereco->getDataAtualizacao() . "'" .
				" where id='" . $o_tipoEndereco->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}

	function deletar(TipoEndereco $o_tipoEndereco){
		$this->sql = "delete from tipo_endereco where id='" . $o_tipoEndereco->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}

	function buscarPorId(TipoEndereco $o_tipoEndereco){
		$this->sql= "select * from tipo_endereco where id= '" . $o_tipoEndereco->getId() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$this->o_tipoEndereco = new TipoEndereco($row->id, $row->descricao, $row->datacadastro, $row->dataatualizacao);
		}

		return $this->o_tipoEndereco;
	}

	function listarTodos(){
		$this->sql= "select * from tipo_endereco" ;
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$this->o_tipoEndereco = new TipoEndereco($row->id, $row->descricao, $row->datacadastro, $row->dataatualizacao);

			array_push($this->v_o_tipoEndereco, $this->o_tipoEndereco);
		}

		return $this->v_o_tipoEndereco;
	}

	function listarPorNome(TipoEndereco $o_tipoEndereco){
		$this->sql= "select * from tipo_endereco where nome like '" . $o_tipoEndereco->getDescricao() . "%'" ;
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$this->o_tipoEndereco = new TipoEndereco($row->id, $row->descricao, $row->datacadastro, $row->dataatualizacao);

			array_push($this->v_o_tipoEndereco, $this->o_tipoEndereco);
		}

		return $this->v_o_tipoEndereco;
	}
}