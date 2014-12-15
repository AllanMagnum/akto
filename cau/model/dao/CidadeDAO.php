<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/EstadoControl.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Estado.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Cidade.php';


class CidadeDAO{
	private $con;
	private $sql;
	private $o_cidade;
	private $v_o_cidade = array();
	
	function __construct($con){
		$this->con = $con;
	}
	
	function cadastrar(Cidade $o_cidade){
		$this->sql = "insert into cidade (nome, idestado) " .
				"values ('" . $o_cidade->getNome() . "', '" . $o_cidade->getOEstado() . "')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function atualizar(Cidade $o_cidade){
		$this->sql = "update cidade set nome= '" . $o_cidade->getNome() . "', idestado= '" . $o_cidade->getOEstado()->getId() . "'" .
				" where id='" . $o_cidade->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function deletar(Cidade $o_cidade){
		$this->sql = "delete from cidade where id='" . $o_cidade->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function buscarPorId(Cidade $o_cidade){
		$this->sql= "select * from cidade where id= '" . $o_cidade->getId() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_estado = new Estado();
			$o_estado->setId($row->idestado);
				
			$o_estadoControl = new EstadoControl($o_estado);
			$o_estado = $o_estadoControl->buscarPorId();
				
			$this->o_cidade = new Cidade($row->id, $row->nome, $o_estado);
		}
	
		return $this->o_cidade;
	
		mysqli_close($this->con);
	}
	
	function listarTodos(){
		$this->sql= "select * from cidade" ;
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_estado = new Estado();
			$o_estado->setId($row->idestado);
				
			$o_estadoControl = new EstadoControl($o_estado);
			$o_estado = $o_estadoControl->buscarPorId();
				
			$this->o_cidade = new Cidade($row->id, $row->nome, $o_estado);
	
			array_push($this->v_o_cidade, $this->o_cidade);
		}
	
		return $this->v_o_cidade;
	
		mysqli_close($this->con);
	}
	
	function listarPorNome(Cidade $o_cidade){
		$this->sql= "select * from cidade where nome like '" . $o_cidade->getNome() . "%'" ;
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_estado = new Estado();
			$o_estado->setId($row->idestado);
				
			$o_estadoControl = new EstadoControl($o_estado);
			$o_estado = $o_estadoControl->buscarPorId();
				
			$this->o_cidade = new Cidade($row->id, $row->nome, $o_estado);
	
			array_push($this->v_o_cidade, $this->o_cidade);
		}
	
		return $this->v_o_cidade;
	
		mysqli_close($this->con);
	}
}
?>