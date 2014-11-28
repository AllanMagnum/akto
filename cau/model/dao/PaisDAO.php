<?php
class PaisDAO{
	private $con;
	private $sql;
	private $v_o_pais = array();

	function __construct($con){
		$this->con = $con;
	}

	function cadastrar($o_pais){
		$this->sql = "insert into pais (nome, sigla) " .
				"values ('" . $o_pais->getNome() . "', '" . $o_pais->getSigla(). "')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}

	function atualizar($o_pais){
		$this->sql = "update pais set nome= '" . $o_pais->getNome . "', sigla= '" . $o_pais->getSigla() . "'" .
				" where id='" . $o_pais->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}

	function deletar($o_pais){
		$this->sql = "delete from pais where id='" . $o_pais->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}

	function buscarPorId($o_pais){
		$this->sql= "select * from pais where id= '" . $o_pais->getId() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_pais = new Pais($row->id, $row->nome, $row->sigla);
		}

		return $o_pais;

		mysqli_close($this->con);
	}
	
	function listarTodos(){
		$this->sql= "select * from pais limit 50" ;
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			
			$o_pais = new Pais($row->id, $row->nome, $row->sigla);
			
			array_push($this->v_o_pais, $o_pais);
		}

		return $this->v_o_pais;

		mysqli_close($this->con);
	}
	
	function listarPorNome($o_pais){
		$this->sql= "select * from pais where nome like '" . $o_pais->getNome() . "%'" ;
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
				
			$o_pais = new Pais($row->id, $row->nome, $row->sigla);
				
			array_push($this->v_o_pais, $o_pais);
		}
	
		return $this->v_o_pais;
	
		mysqli_close($this->con);
	}
}
?>