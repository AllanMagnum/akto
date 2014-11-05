<?php
class SistemaDAO{
	private $con;
	private $sql;
	private $v_o_sistema = array();

	function __construct($con){
		$this->con = $con;
	}

	function cadastrar($o_sistema){
		$this->sql = "insert into sistema (nome, sigla, dataCadastro, dataAtualizacao) " .
				"values ('" . $o_sistema->getNome(). "', '" . $o_sistema->getSigla() . "', '" . $o_sistema->getDataCadastro() . "', '" . $o_sistema->getDataAtualizacao() . "')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		echo "registro adicionado";
		mysqli_close($this->con);
	}

	function atualizar($o_sistema){
		$this->sql = "update sistema set nome= '" . $o_sistema->getNome(). "', sigla= '" . $o_sistema->getSigla() . "', dataCadastro= '" . $o_sistema->getDataCadastro() . "', dataAtualizacao= '" . $o_sistema->getDataAtualizacao() . "'" .
				" where id='" . $o_sistema->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		echo "registro atualizado";
		mysqli_close($this->con);
	}

	function deletar($o_sistema){
		$this->sql = "delete from sistema where id='" . $o_sistema->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		echo "registro deletado";
		mysqli_close($this->con);
	}

	function listarTodos(){
		mysqli_set_charset($this->con, "utf8");
			
		$this->sql= "select * from sistema limit 50";
		$query = mysqli_query($this->con, $this->sql);
			
		if (!$query) {
			die('Error: ' . mysqli_error($this->con));
		}
			
		while($row = mysqli_fetch_object($query)){
			$o_sistema = new Sistema($row->id, $row->nome, $row->sigla, $row->datacadastro, $row->dataatualizacao);
			array_push($this->v_o_sistema,(array) $o_sistema);
		}
		return $this->v_o_sistema;
		echo "registro listado";
		echo "<br>";
		mysqli_close($this->con);
	}

	function buscarPorId($o_sistema){
		$this->sql= "select * from sistema where id= '" . $o_sistema->getId() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			$o_sistema = new Sistema($row->id, $row->nome, $row->sigla, $row->datacadastro, $row->dataatualizacao);
			array_push($this->v_o_sistema,(array) $o_sistema);
		}
		return $this->v_o_sistema;
		echo "registro encontrado";
		mysqli_close($this->con);
	}
}
?>