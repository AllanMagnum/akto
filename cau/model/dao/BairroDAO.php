<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'util/Conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/CidadeControl.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Cidade.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Bairro.php';

class BairroDAO{
	private $con;
	private $sql;
	private $o_bairro;
	private $v_o_bairro = array();
	
	function __construct($con){
		$this->con = $con;
	}
	
	function cadastrar($o_bairro){
		$this->sql = "insert into bairro (nome, idbairro) " .
				"values ('" . $o_bairro->getNome() . "', '" . $o_bairro->getOCidade() . "')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function atualizar($o_bairro){
		$this->sql = "update bairro set nome= '" . $o_bairro->getNome() . "', idcidade= '" . $o_bairro->getOCidade()->getId() . "'" .
				" where id='" . $o_bairro->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function deletar($o_bairro){
		$this->sql = "delete from bairro where id='" . $o_bairro->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function buscarPorId($o_bairro){
		$this->sql= "select * from bairro where id= '" . $o_bairro->getId() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_cidade = new Cidade();
			$o_cidade->setId($row->idcidade);
	
			$o_cidadeControl = new CidadeControl($o_cidade);
			$o_cidade = $o_cidadeControl->buscarPorId();
	
			$this->o_bairro = new Bairro($row->id, $row->nome, $o_cidade);
		}
	
		return $this->o_bairro;
	
		mysqli_close($this->con);
	}
	
	function listarTodos(){
		$this->sql= "select * from bairro" ;
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_cidade = new Cidade();
			$o_cidade->setId($row->idcidade);
	
			$o_cidadeControl = new CidadeControl($o_cidade);
			$o_cidade = $o_cidadeControl->buscarPorId();
	
			$this->o_bairro = new Bairro($row->id, $row->nome, $o_cidade);
	
			array_push($this->v_o_bairro, $this->o_bairro);
		}
	
		return $this->v_o_bairro;
	
		mysqli_close($this->con);
	}
	
	function listarPorNome($o_bairro){
		$this->sql= "select * from bairro where nome like '" . $o_bairro->getNome() . "%'" ;
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_cidade = new Cidade();
			$o_cidade->setId($row->idcidade);
	
			$o_cidadeControl = new CidadeControl($o_cidade);
			$o_cidade = $o_cidadeControl->buscarPorId();
	
			$this->o_bairro = new Bairro($row->id, $row->nome, $o_cidade);
	
			array_push($this->v_o_bairro, $this->o_bairro);
		}
	
		return $this->v_o_bairro;
	
		mysqli_close($this->con);
	}
}
?>