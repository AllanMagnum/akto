<?php
class EstadoControl{
	protected $con;
	protected $o_estado;
	protected $o_estadoDAO;
	
	function __construct($o_estado=""){
		$conexao = new Conexao();
		$this->con = $conexao->getConnection();
		$this->o_estadoDAO = new EstadoDAO($this->con);
		$this->o_estado = $o_estado;
	}
	
	function cadastrar(){
		$this->o_estadoDAO->cadastrar($this->o_estado);
	}
	
	function atualizar(){
		
	}
}
?>