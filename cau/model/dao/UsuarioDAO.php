<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Perfil.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/PerfilControl.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Pessoa.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/PessoaControl.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Usuario.php';

class UsuarioDAO{
	private $con;
	private $sql;
	private $v_o_usuario = array();

	public function __construct($con){
		$this->con = $con;
	}

	public function cadastrar($o_usuario){
		$this->sql = "insert into usuario (login, senha, idperfil, idpessoa, dataCadastro, dataAtualizacao) " .
				"values ('" . $o_usuario->getLogin() . "', '" . $o_usuario->getSenha() . "', '" .
				         $o_usuario->getOPerfil()->getId() . "', '" . $o_usuario->getOPessoa()->getId() . "', '" .
				         $o_usuario->getDataCadastro() . "', '" . $o_usuario->getDataAtualizacao() .
				"')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	public function atualizar($o_usuario){
		$this->sql = "update usuario set login= '" . $o_usuario->getLogin() . "', senha= '" . $o_usuario->getSenha() .
				                       "', idperfil= '" .  $o_usuario->getOPerfil()->getId() . "', idpessoa= '" . $o_usuario->getOPessoa()->getId() .
				                       "', dataCadastro= '" . $o_usuario->getDataCadastro() . "', dataAtualizacao= '" . $o_usuario->getDataAtualizacao() . "'" .
				    " where id='" . $o_usuario->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	public function deletar($o_usuario){
		$this->sql = "delete from usuario where id='" . $o_usuario->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}
	
	function listarTodos(){
		mysqli_set_charset($this->con, "utf8");
			
		$this->sql= "select * from usuario limit 50";
		$query = mysqli_query($this->con, $this->sql);
			
		if (!$query) {
			die('Error: ' . mysqli_error($this->con));
		}
			
		while($row = mysqli_fetch_object($query)){
			$o_perfil = new Perfil();
			$o_perfil->setId($row->idperfil);
			
			$o_perfilControl = new PerfilControl($o_perfil);
			$o_perfil = $o_perfilControl->buscarPorId($row->idperfil);
			
			$o_pessoa = new Pessoa();
			$o_pessoa->setId($row->idpessoa);
			
			$o_pessoaControl = new PessoaControl($o_pessoa);
			$o_pessoa = $o_pessoaControl->buscarPorId();
			
			$o_usuario = new Usuario($row->id, $row->login, $row->senha, $o_perfil,
					                 $o_pessoa, $row->datacadastro, $row->dataatualizacao);
			array_push($this->v_o_usuario, $o_usuario);
		}
		return $this->v_o_usuario;
		mysqli_close($this->con);
	}
	
	public function buscarPorId($o_usuario){
		$this->sql= "select * from usuario where id= '" . $o_usuario->getId() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		while($row = mysqli_fetch_object($st_query)){
			
			$o_perfil = new Perfil();
			$o_perfil->setId($row->idperfil);
			
			$o_perfilControl = new PerfilControl($o_perfil);
			$o_perfil = $o_perfilControl->buscarPorId($row->idperfil);
			
			$o_pessoa = new Pessoa();
			$o_pessoa->setId($row->idpessoa);
			
			$o_pessoaControl = new PessoaControl($o_pessoa);
			$o_pessoa = $o_pessoaControl->buscarPorId();
			
			$o_usuario = new Usuario($row->id, $row->login, $row->senha, $o_perfil,
					                 $o_pessoa, $row->datacadastro, $row->dataatualizacao);
			
		}

		return $o_usuario;
		
		mysqli_close($this->con);
	}
	
	public function autenticar($o_usuario){
		$resposta = FALSE;
		$this->sql= "select * from usuario where login= '" . $o_usuario->getLogin() . "' and senha = '" . $o_usuario->getSenha() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (!$st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		
		$registro = mysqli_num_rows($st_query);
		
		echo $registro;
		
		if ($registro > 0) {
			$resposta = TRUE;
		}
		
		return $resposta;
	}

	
}
?>