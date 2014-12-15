<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Perfil.php'; 

class PerfilDAO{
	private $con;
	private $sql;
	private $o_pais;
	private $v_o_perfil = array();

	function __construct($con){
		$this->con = $con;
	}

	function cadastrar(Perfil $o_perfil){
		$this->sql = "insert into perfil (nome, dataCadastro, dataAtualizacao) " .
				      "values ('" . $o_perfil->getNome() . "', '" . $o_perfil->getDataCadastro() . "', '" . $o_perfil->getDataAtualizacao() . "')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}

	function atualizar(Perfil $o_perfil){
		$this->sql = "update perfil set nome= '" . $o_perfil->getNome() . "', dataCadastro= '" . $o_perfil->getDataCadastro() . "', dataAtualizacao= '" . $o_perfil->getDataAtualizacao() . "'" .
				    " where id='" . $o_perfil->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}

	function deletar(Perfil $o_perfil){
		$this->sql = "delete from perfil where id='" . $o_perfil->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}

	function listarTodos(){
			
		$this->sql= "select * from perfil limit 50";
		$query = mysqli_query($this->con, $this->sql);
			
		if (!$query) {
			die('Error: ' . mysqli_error($this->con));
		}
			
		while($row = mysqli_fetch_object($query)){
			$this->o_perfil = new Perfil($row->id, $row->nome, $row->datacadastro, $row->dataatualizacao);
			array_push($this->v_o_perfil, $this->o_perfil);
		}
		return $this->v_o_perfil;
	}

	function buscarPorId(Perfil $o_perfil){
		$this->sql= "select * from perfil where id= '" . $o_perfil->getId() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$this->o_perfil = new Perfil($row->id, $row->nome, $row->datacadastro, $row->dataatualizacao);
		}
		
		return $this->o_perfil;
	}
}
?>