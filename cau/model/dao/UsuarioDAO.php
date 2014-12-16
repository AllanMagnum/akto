<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Perfil.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/PerfilControl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/PessoaFisica.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/PessoaFisicaControl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Usuario.php';

class UsuarioDAO{
	private $con;
	private $sql;
	private $o_usuario;
	private $v_o_usuario = array();

	public function __construct($con){
		$this->con = $con;
	}

	public function cadastrar(Usuario $o_usuario){
		$this->sql = "insert into usuario (login, senha, idperfil, idpessoa, dataCadastro, dataAtualizacao) " .
				"values ('" . $o_usuario->getLogin() . "', '" . $o_usuario->getSenha() . "', '" .
				         $o_usuario->getOPerfil()->getId() . "', '" . $o_usuario->getOPessoaFisica()->getId() . "', '" .
				         $o_usuario->getDataCadastro() . "', '" . $o_usuario->getDataAtualizacao() .
				"')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}
	
	public function atualizar(Usuario $o_usuario){
		$this->sql = "update usuario set login= '" . $o_usuario->getLogin() . "', senha= '" . $o_usuario->getSenha() .
				                       "', idperfil= '" .  $o_usuario->getOPerfil()->getId() . "', idpessoa= '" . $o_usuario->getOPessoaFisica()->getId() .
				                       "', dataCadastro= '" . $o_usuario->getDataCadastro() . "', dataAtualizacao= '" . $o_usuario->getDataAtualizacao() . "'" .
				    " where id='" . $o_usuario->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	}
	
	public function deletar(Usuario $o_usuario){
		$this->sql = "delete from usuario where id='" . $o_usuario->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
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
			
			$o_pessoaFisica = new PessoaFisica();
			$o_pessoaFisica->setId($row->idpessoa);
			
			$o_pessoaFisicaControl = new PessoaFisicaControl($o_pessoaFisica);
			$o_pessoaFisica = $o_pessoaFisicaControl->buscarPorId();
			
			$this->o_usuario = new Usuario($row->id, $row->login, $row->senha, $o_perfil,
					                 $o_pessoaFisica, $row->datacadastro, $row->dataatualizacao);
			array_push($this->v_o_usuario, $this->o_usuario);
		}
		return $this->v_o_usuario;
	}
	
	public function buscarPorId(Usuario $o_usuario){
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
			
			$o_pessoaFisica = new PessoaFisica();
			$o_pessoaFisica->setId($row->idpessoa);
			
			$o_pessoaFisicaControl = new PessoaFisicaControl($o_pessoaFisica);
			$o_pessoaFisica = $o_pessoaFisicaControl->buscarPorId();
			
			$this->o_usuario = new Usuario($row->id, $row->login, $row->senha, $o_perfil,
					                 $o_pessoaFisica, $row->datacadastro, $row->dataatualizacao);
			
		}

		return $this->o_usuario;
	}
	
	public function autenticar(Usuario $o_usuario){
		
		$resposta = 0;
		$this->sql= "select * from usuario where login= '" . $o_usuario->getLogin() . "'";
		$st_query = mysqli_query($this->con, $this->sql);
		if (! $st_query) {
			die('Error: ' . mysqli_error($this->con));
		}
		
		$registro = mysqli_num_rows($st_query);
		
		if ($registro > 0) {
			while($row = mysqli_fetch_object($st_query)){
				if ($row->senha == $o_usuario->getSenha()){
					$resposta = 1;
				}
			}	
		}
		
		return $resposta;
	}

	
}
?>