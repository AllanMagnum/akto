<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Opcoes.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/OpcoesControl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Perfil.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/PerfilControl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Sistema.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/SistemaControl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/UsuarioControl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Acesso.php';

class AcessoDAO{
	private $con;
	private $sql;
	private $o_acesso;
	private $v_o_acesso = array();

	function __construct($con){
		$this->con = $con;
	}

	function cadastrar(Acesso $o_acesso){
		$this->sql = "insert into acesso (idusuario, idperfil, idsistema, idopcoes, " .
				"visualizar, cadastrar, consultar, atualizar, deletar, dataCadastro, dataAtualizacao) " .
				"values ('" . $o_acesso->getOUsuario()->getId() . "', '" . $o_acesso->getOPerfil()->getId() . "', '" . $o_acesso->getOSistema()->getId() . "', '" .
				$o_acesso->getOOpcoes()->getId() . "', '" . $o_acesso->getVisualizar() . "', '" . $o_acesso->getCadastrar() . "', '" .
				$o_acesso->getConsultar() . "', '" . $o_acesso->getAtualizar() . "', '" . $o_acesso->getDeletar() . "', '" .
				$o_acesso->getDataCadastro() . "', '" . $o_acesso->getDataAtualizacao() .
				"')";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		mysqli_close($this->con);
	}

	function atualizar(Acesso $o_acesso){
		$this->sql = "update acesso set idusuario= '" . $o_acesso->getOUsuario()->getId() . "', idperfil= '" . $o_acesso->getOPerfil()->getId() . "', idsistema=  '" . $o_acesso->getOSistema()->getId() . "'," .
				"idopcoes = '" . $o_acesso->getOOpcoes()->getId() . "', visualizar= '" . $o_acesso->getVisualizar() . "', cadastrar= '" . $o_acesso->getCadastrar() . "'," .
				"consultar = '" . $o_acesso->getConsultar() . "', atualizar= '" . $o_acesso->getAtualizar() . "', deletar= '" . $o_acesso->getDeletar() . "'," .
				"datacadastro= '" . $o_acesso->getDataCadastro() . "', dataatualizacao= '" . $o_acesso->getDataAtualizacao() . "'" .
				" where idusuario='" . $o_acesso->getOUsuario()->getId() ."' and idperfil = '" . $o_acesso->getOPerfil()->getId() . "' and idsistema = '" . $o_acesso->getOSistema()->getId() . "' and idopcoes = '" . $o_acesso->getOOpcoes()->getId() . "'";
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	
		mysqli_close($this->con);
	}

	function deletarPorUsuario(Acesso $o_acesso){
		$this->sql = "delete from acesso where idusuario='" . $o_acesso->getOUsuario()->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		
		mysqli_close($this->con);
	}
	
	function deletarPorPerfil(Acesso $o_acesso){
		$this->sql = "delete from acesso where idperfil='" . $o_acesso->getOPerfil()->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	
		mysqli_close($this->con);
	}
	
	function deletarPorSistema(Acesso $o_acesso){
		$this->sql = "delete from acesso where idsistema='" . $o_acesso->getOSistema()->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		
		mysqli_close($this->con);
	}

	function listarTodos(){
		mysqli_set_charset($this->con, "utf8");
			
		$this->sql= "select * from acesso";
		$query = mysqli_query($this->con, $this->sql);
			
		if (!$query) {
			die('Error: ' . mysqli_error($this->con));
		}
			
		$o_usuario = new Usuario();
		$o_perfil = new Perfil();
		$o_sistema = new Sistema();
		$o_opcoes = new Opcoes();
		
		while($row = mysqli_fetch_object($query)){
			$o_usuario->setId($row->idusuario);
			$o_usuarioControl = new UsuarioControl($o_usuario);
			$o_usuario = $o_usuarioControl->buscarPorId();
			
			$o_perfil->setId($row->idperfil);
			$o_perfilControl = new PerfilControl($o_perfil);
			$o_perfil = $o_perfilControl->buscarPorId();
			
			$o_sistema->setId($row->idsistema);
			$o_sistemaControl = new SistemaControl($o_sistema);
			$o_sistema = $o_sistemaControl->buscarPorId();
			
			$o_opcoes->setId($row->idopcoes);
			$o_opcoesControl = new OpcoesControl($o_opcoes);
			$o_opcoes = $o_opcoesControl->buscarPorId();
			
			$this->o_acesso = new Acesso($o_usuario, $o_perfil, $o_sistema,
					               $o_opcoes, $row->visualizar, $row->cadastrar, $row->consultar,
					               $row->atualizar, $row->deletar, $row->datacadastro, $row->dataatualizacao);
			array_push($this->v_o_acesso, $this->o_acesso);
		}
		
		return $this->v_o_acesso;
		
		mysqli_close($this->con);
	}

	public function buscarPorUsuario(Acesso $o_acesso){
		$this->sql= "select * from acesso where idusuario= '" . $o_acesso->getOUsuario()->getId() . "'";
		$query = mysqli_query($this->con, $this->sql);
		if (!$query) {
			die('Error: ' . mysqli_error($this->con));
		}
		$o_usuario = new Usuario();
		$o_perfil = new Perfil();
		$o_sistema = new Sistema();
		$o_opcoes = new Opcoes();
		
		while($row = mysqli_fetch_object($query)){
			
			$o_usuario->setId($row->idusuario);
			$o_usuarioControl = new UsuarioControl($o_usuario);
			$o_usuario = $o_usuarioControl->buscarPorId();
			
			$o_perfil->setId($row->idperfil);
			$o_perfilControl = new PerfilControl($o_perfil);
			$o_perfil = $o_perfilControl->buscarPorId();
			
			$o_sistema->setId($row->idsistema);
			$o_sistemaControl = new SistemaControl($o_sistema);
			$o_sistema = $o_sistemaControl->buscarPorId();
			
			$o_opcoes->setId($row->idopcoes);
			$o_opcoesControl = new OpcoesControl($o_opcoes);
			$o_opcoes = $o_opcoesControl->buscarPorId();
			
			$this->o_acesso = new Acesso($o_usuario, $o_perfil, $o_sistema,
					               $o_opcoes, $row->visualizar, $row->cadastrar, $row->consultar,
					               $row->atualizar, $row->deletar, $row->datacadastro, $row->dataatualizacao);
			
			array_push($this->v_o_acesso, $this->o_acesso);
		}
		
		return $this->v_o_acesso;
		
		mysqli_close($this->con);
	}
	
	function buscarPorPerfil(Acesso $o_acesso){
		$this->sql= "select * from acesso where idperfil= '" . $o_acesso->getOPerfil()->getId() . "'";
		$query = mysqli_query($this->con, $this->sql);
		if (!$query) {
			die('Error: ' . mysqli_error($this->con));
		}
		$o_usuario = new Usuario();
		$o_perfil = new Perfil();
		$o_sistema = new Sistema();
		$o_opcoes = new Opcoes();
	
		while($row = mysqli_fetch_object($query)){
			$o_usuario->setId($row->idusuario);
			$o_usuarioControl = new UsuarioControl($o_usuario);
			$o_usuario = $o_usuarioControl->buscarPorId();
				
			$o_perfil->setId($row->idperfil);
			$o_perfilControl = new PerfilControl($o_perfil);
			$o_perfil = $o_perfilControl->buscarPorId();
				
			$o_sistema->setId($row->idsistema);
			$o_sistemaControl = new SistemaControl($o_sistema);
			$o_sistema = $o_sistemaControl->buscarPorId();
				
			$o_opcoes->setId($row->idopcoes);
			$o_opcoesControl = new OpcoesControl($o_opcoes);
			$o_opcoes = $o_opcoesControl->buscarPorId();
				
			$this->o_acesso = new Acesso($o_usuario, $o_perfil, $o_sistema,
								   $o_opcoes, $row->visualizar, $row->cadastrar, $row->consultar,
								   $row->atualizar, $row->deletar, $row->datacadastro, $row->dataatualizacao);
			
			array_push($this->v_o_acesso, $this->o_acesso);
		}
		return $this->v_o_acesso;
		
		mysqli_close($this->con);
	}
	
	function buscarPorSistema(Acesso $o_acesso){
		$this->sql= "select * from acesso where idsistema= '" . $o_acesso->getOSistema()->getId() . "'";
		$query = mysqli_query($this->con, $this->sql);
		if (!$query) {
			die('Error: ' . mysqli_error($this->con));
		}
		$o_usuario = new Usuario();
		$o_perfil = new Perfil();
		$o_sistema = new Sistema();
		$o_opcoes = new Opcoes();
	
		while($row = mysqli_fetch_object($query)){
			$o_usuario->setId($row->idusuario);
			$o_usuarioControl = new UsuarioControl($o_usuario);
			$o_usuario = $o_usuarioControl->buscarPorId();
				
			$o_perfil->setId($row->idperfil);
			$o_perfilControl = new PerfilControl($o_perfil);
			$o_perfil = $o_perfilControl->buscarPorId();
				
			$o_sistema->setId($row->idsistema);
			$o_sistemaControl = new SistemaControl($o_sistema);
			$o_sistema = $o_sistemaControl->buscarPorId();
				
			$o_opcoes->setId($row->idopcoes);
			$o_opcoesControl = new OpcoesControl($o_opcoes);
			$o_opcoes = $o_opcoesControl->buscarPorId();
				
			$this->o_acesso = new Acesso($o_usuario, $o_perfil, $o_sistema,
								   $o_opcoes, $row->visualizar, $row->cadastrar, $row->consultar,
					               $row->atualizar, $row->deletar, $row->datacadastro, $row->dataatualizacao);
			array_push($this->v_o_acesso, $this->o_acesso);
		}
		return $this->v_o_acesso;

		mysqli_close($this->con);
	}

}
?>