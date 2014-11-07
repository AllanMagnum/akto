<?php
class OpcoesDAO{
	private $con;
	private $sql;
	private $v_o_opcoes = array();
	
	function __construct($con){
		$this->con = $con;
	}
	
	function cadastrar($o_opcoes){
		$this->sql = "insert into opcoes (nome, tipo, url, idsistema, dataCadastro, dataAtualizacao) " .
				"values ('" . $o_opcoes->getNome(). "', '" . $o_opcoes->getTipo() . "', '" . $o_opcoes->getUrl() . "', '" . $o_opcoes->getOSistema()->getId() . "', '" . $o_opcoes->getDataCadastro() . "', '" . $o_opcoes->getDataAtualizacao() . "')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function atualizar($o_opcoes){
		$this->sql = "update opcoes set nome= '" . $o_opcoes->getNome(). "', tipo= '" . $o_opcoes->getTipo() . "', url= '" . $o_opcoes->getUrl()  . "', idsistema= '" . $o_opcoes->getOSistema()->getId() . "', dataCadastro= '" . $o_opcoes->getDataCadastro() . "', dataAtualizacao= '" . $o_opcoes->getDataAtualizacao() . "'" .
				" where id='" . $o_opcoes->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function deletar($o_opcoes){
		$this->sql = "delete from opcoes where id='" . $o_opcoes->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function buscarPorId($o_opcoes){
		$this->sql= "select * from opcoes where id= '" . $o_opcoes->getId() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			
			$o_sistema = new Sistema();
			$o_sistema->setId($row->idsistema);
			
			$o_sistemaControl = new SistemaControl($o_sistema);
			$o_sistema = $o_sistemaControl->buscarPorId();
			
			$o_opcoes = new Opcoes($row->id, $row->nome, $row->tipo, $row->url, $row->datacadastro, $row->dataatualizacao, $o_sistema);
		}
		return $o_opcoes;
		
		mysqli_close($this->con);
	}
}
?>