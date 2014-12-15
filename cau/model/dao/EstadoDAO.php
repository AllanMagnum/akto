<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/PaisControl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Pais.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Estado.php';

class EstadoDAO{
	private $con;
	private $sql;
	private $o_estado;
	private $v_o_estado = array();
	
	function __construct($con){
		$this->con = $con;
	}
	
	function cadastrar(Estado $o_estado){
		$this->sql = "insert into estado (nome, sigla, idpais) " .
				"values ('" . $o_estado->getNome() . "', '" . $o_estado->getSigla() . "', '" . $o_estado->getOPais()->getId() . "')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}
	
	function atualizar($o_estado){
		$this->sql = "update estado set nome= '" . $o_estado->getNome . "', sigla= '" . $o_estado->getSigla() . "', idpais= '" . $o_estado->getOPais()->getId() . "'" .
				" where id='" . $o_estado->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}
	
	function deletar(Estado $o_estado){
		$this->sql = "delete from estado where id='" . $o_estado->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}
	
	function buscarPorId(Estado $o_estado){
		$this->sql= "select * from estado where id= '" . $o_estado->getId() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_pais = new Pais();
			$o_pais->setId($row->idpais);
			
			$o_paisControl = new PaisControl($o_pais);
			$o_pais = $o_paisControl->buscarPorId();
			
			$this->o_estado = new Estado($row->id, $row->nome, $row->sigla, $o_pais);
		}
	
		return $this->o_estado;
	}
	
	function listarTodos(){
		$this->sql= "select * from estado" ;
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_pais = new Pais();
			$o_pais->setId($row->idpais);
				
			$o_paisControl = new PaisControl($o_pais);
			$o_pais = $o_paisControl->buscarPorId();
			
			$this->o_estado = new Estado($row->id, $row->nome, $row->sigla, $o_pais);
				
			array_push($this->v_o_estado, $this->o_estado);
		}
	
		return $this->v_o_estado;
	}
	
	function listarPorNome(Estado $o_estado){
		$this->sql= "select * from estado where nome like '" . $o_estado->getNome() . "%'" ;
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_pais = new Pais();
			$o_pais->setId($row->idpais);
			
			$o_paisControl = new PaisControl($o_pais);
			$o_pais = $o_paisControl->buscarPorId();
			
			$this->o_estado = new Estado($row->id, $row->nome, $row->sigla, $o_pais);
	
			array_push($this->v_o_estado, $this->o_estado);
		}
	
		return $this->v_o_estado;
	}
}
?>