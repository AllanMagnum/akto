<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/BairroControl.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Bairro.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Logradouro.php';

class LogradouroDAO{
	private $con;
	private $sql;
	private $o_logradouro;
	private $v_o_logradouro= array();
	
	function __construct($con){
		$this->con = $con;
	}
	
	function cadastrar($o_logradouro){
		$this->sql = "insert into logradouro (cep, tipo, endereco,  idbairro) " .
				"values ('" . $o_logradouro->getCep() . "', '" . $o_logradouro->getTipo() . "', '" . $o_logradouro->getEndereco() . "', '" . $o_logradouro->getOBairro()->getId() . "')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function atualizar($o_logradouro){
		$this->sql = "update logradouro set cep= '" . $o_logradouro->getCep() . "', tipo= '" . $o_logradouro->getTipo() . "', endereco= '" . $o_logradouro->getEndereco() . "', idbairro= '" . $o_logradouro->getBairro()->getId() . "'" .
				" where id='" . $o_logradouro->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function deletar($o_logradouro){
		$this->sql = "delete from logradouro where id='" . $o_logradouro->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function buscarPorId($o_logradouro){
		$this->sql= "select * from logradouro where id= '" . $o_logradouro->getId() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_bairro = new Bairro();
			$o_bairro->setId($row->idbairro);
	
			$o_bairroControl = new BairroControl($o_bairro);
			$o_bairro = $o_bairroControl->buscarPorId();
	
			$this->o_logradouro = new Logradouro($row->id, $row->cep, $row->tipo, $row->endereco, $o_bairro);
		}
	
		return $this->o_logradouro;
	
		mysqli_close($this->con);
	}
	
	function listarTodos(){
		$this->sql= "select * from logradouro" ;
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_bairro = new Bairro();
			$o_bairro->setId($row->idbairro);
	
			$o_bairroControl = new BairroControl($o_bairro);
			$o_bairro = $o_bairroControl->buscarPorId();
	
			$this->o_logradouro = new Logradouro($row->id, $row->cep, $row->tipo, $row->endereco, $o_bairro);
	
			array_push($this->v_o_logradouro, $this->o_logradouro);
		}
	
		return $this->v_o_logradouro;
	
		mysqli_close($this->con);
	}
	
}
?>