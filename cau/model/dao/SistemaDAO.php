<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Sistema.php';

class SistemaDAO{
	private $con;
	private $sql;
	private $o_sistema;
	private $v_o_sistema = array();
	private $v_o_opcoes = array();

	function __construct($con){
		$this->con = $con;
	}

	function cadastrar(Sistema $o_sistema){
		$this->sql = "insert into sistema (nome, sigla, dataCadastro, dataAtualizacao) " .
				"values ('" . $o_sistema->getNome(). "', '" . $o_sistema->getSigla() . "', '" . $o_sistema->getDataCadastro() . "', '" . $o_sistema->getDataAtualizacao() . "')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}

	function atualizar(Sistema $o_sistema){
		$this->sql = "update sistema set nome= '" . $o_sistema->getNome(). "', sigla= '" . $o_sistema->getSigla() . "', dataCadastro= '" . $o_sistema->getDataCadastro() . "', dataAtualizacao= '" . $o_sistema->getDataAtualizacao() . "'" .
				" where id='" . $o_sistema->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}

	function deletar(Sistema $o_sistema){
		$this->sql = "delete from sistema where id='" . $o_sistema->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}

	function listarTodos(){
		mysqli_set_charset($this->con, "utf8");
			
		$this->sql= "select * from sistema";
		$query = mysqli_query($this->con, $this->sql);
			
		if (!$query) {
			die('Error: ' . mysqli_error($this->con));
		}
			
		while($row = mysqli_fetch_object($query)){
			$this->o_sistema = new Sistema($row->id, $row->nome, $row->sigla, $row->datacadastro, $row->dataatualizacao);
			array_push($this->v_o_sistema, $this->o_sistema);
		}
		return $this->v_o_sistema;
		
		mysqli_close($this->con);
	}

	function buscarPorId(Sistema $o_sistema){
		$this->sql= "select * from sistema where id= '" . $o_sistema->getId() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$this->o_sistema = new Sistema($row->id, $row->nome, $row->sigla, $row->datacadastro, $row->dataatualizacao);
		}
		return $this->o_sistema;
		
		mysqli_close($this->con);
	}
	
	function listarOpcoes(Sistema $o_sistema){
		mysqli_set_charset($this->con, "utf8");
			
		$this->sql= "select t1.*, t2.* from sistema t1 inner join opcoes t2 on t1.id = t2.idsistema where t1.id = " . $o_sistema->getId();
		$query = mysqli_query($this->con, $this->sql);
			
		if (!$query) {
			die('Error: ' . mysqli_error($this->con));
		}
			
		while($row = mysqli_fetch_object($query)){
			
			$o_sistemaControl = new SistemaControl($o_sistema);
			$o_sistema = $o_sistemaControl->buscarPorId();
			
			$o_opcoes = new Opcoes($row->id, $row->nome, $row->tipo, $row->tipo, $row->datacadastro, $row->dataatualizacao, $o_sistema);
			
			array_push($this->v_o_opcoes, $o_opcoes);
		}
		return $this->v_o_opcoes;
		
		mysqli_close($this->con);
	}

}
?>