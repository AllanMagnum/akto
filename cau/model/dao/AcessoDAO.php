<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Opcoes.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/OpcoesControl.php';

class AcessoDAO{
	private $con;
	private $sql;
	private $v_o_acesso = array();

	function __construct($con){
		$this->con = $con;
	}

	function cadastrar($o_acesso){
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

	function atualizar($o_acesso){
		$this->sql = "update acesso set idusuario= '" . $o_acesso->getUsuario()->getId() . "', idperfil= '" . $o_acesso->getPerifl()->getId() . "', idsistema=  '" . $o_acesso->getSistema()->getId() . "'" .
				"idopcoes = " . $o_acesso->getOpcoes()->getId() . "', visualizar= '" . $o_acesso->getVisualizar() . "', cadastrar= '" . $o_acesso->getCadastrar() . "'" .
				"consultar = " . $o_acesso->getConsultar() . "', atualizar= '" . $o_acesso->getAtualizar() . "', deletar= '" . $o_acesso->getDeletar() . "'" .
				"', dataCadastro= '" . $o_acesso->getDataCadastro() . "', dataAtualizacao= '" . $o_acesso->getDataAtualizacao() . "'" .
				" where id='" . $o_acesso->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	
		mysqli_close($this->con);
	}

	function deletarPorUsuario($o_acesso){
		$this->sql = "delete from acesso where idusuario='" . $o_acesso->getOUsuario()->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
		
		mysqli_close($this->con);
	}
	
	function deletarPorPerfil($o_acesso){
		$this->sql = "delete from acesso where idperfil='" . $o_acesso->getOPerfil()->getId() ."'" ;
		if (!mysqli_query($this->con, $this->sql)) {
			die('Error: ' . mysqli_error($this->con));
		}
	
		mysqli_close($this->con);
	}
	
	function deletarPorSistema($o_acesso){
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
		
		$conexao = new Conexao();
		$con = $conexao->getConnection();
		
		while($row = mysqli_fetch_object($query)){
			$o_usuario->setId($row->idusuario);
			$o_usuarioDAO = new UsuarioDAO($con);
			$o_usuario = $o_usuarioDAO->buscarPorId($o_usuario);
			
			$o_perfil->setId($row->idperfil);
			$o_perfilDAO = new PerfilDAO($con);
			$o_perfil = $o_perfilDAO->buscarPorId($o_perfil);
			
			$o_sistema->setId($row->idsistema);
			$o_sistemaDAO = new SistemaDAO($con);
			$o_sistema = $o_sistemaDAO->buscarPorId($o_sistema);
			
			$o_opcoes->setId($row->idopcoes);
			$o_opcoesDAO = new OpcoesDAO($con);
			$o_opcoes = $o_opcoesDAO->buscarPorId($o_opcoes);
			
			$o_acesso = new Acesso($o_usuario, $o_perfil, $o_sistema,
					               $o_opcoes, $row->visualizar, $row->cadastrar, $row->consultar,
					               $row->atualizar, $row->deletar, $row->datacadastro, $row->dataatualizacao);
			array_push($this->v_o_acesso,(array) $o_acesso);
		}
		return $this->v_o_acesso;
		echo "registro listado";
		echo "<br>";
		mysqli_close($this->con);
	}

	public function buscarPorUsuario($o_acesso){
		$this->sql= "select * from acesso where idusuario= '" . $o_acesso->getOUsuario()->getId() . "'";
		$query = mysqli_query($this->con, $this->sql);
		if (!$query) {
			die('Error: ' . mysqli_error($this->con));
		}
		$o_usuario = new Usuario();
		$o_perfil = new Perfil();
		$o_sistema = new Sistema();
		$o_opcoes = new Opcoes();
		
		$conexao = new Conexao();
		$con = $conexao->getConnection();
		
		while($row = mysqli_fetch_object($query)){
			
			$o_usuario->setId($row->idusuario);
			$o_usuarioDAO = new UsuarioDAO($con);
			$o_usuario = $o_usuarioDAO->buscarPorId($o_usuario);
			
			$o_perfil->setId($row->idperfil);
			$o_perfilDAO = new PerfilDAO($con);
			$o_perfil = $o_perfilDAO->buscarPorId($o_perfil);
			
			$o_sistema->setId($row->idsistema);
			$o_sistemaDAO = new SistemaDAO($con);
			$o_sistema = $o_sistemaDAO->buscarPorId($o_sistema);
			
			$o_opcoes->setId($row->idopcoes);
			$o_opcoesDAO = new OpcoesDAO($con);
			$o_opcoes = $o_opcoesDAO->buscarPorId($o_opcoes);
			
			$o_acesso = new Acesso($o_usuario, $o_perfil, $o_sistema,
					               $o_opcoes, $row->visualizar, $row->cadastrar, $row->consultar,
					               $row->atualizar, $row->deletar, $row->datacadastro, $row->dataatualizacao);
			
			array_push($this->v_o_acesso, $o_acesso);
		}
		return $this->v_o_acesso;
		
		mysqli_close($this->con);
	}
	
	function buscarPorPerfil($o_acesso){
		$this->sql= "select * from acesso where idperfil= '" . $o_acesso->getOPerfil()->getId() . "'";
		$query = mysqli_query($this->con, $this->sql);
		if (!$query) {
			die('Error: ' . mysqli_error($this->con));
		}
		$o_usuario = new Usuario();
		$o_perfil = new Perfil();
		$o_sistema = new Sistema();
		$o_opcoes = new Opcoes();
	
		$conexao = new Conexao();
		$con = $conexao->getConnection();
	
		while($row = mysqli_fetch_object($query)){
			$o_usuario->setId($row->idusuario);
			$o_usuarioDAO = new UsuarioDAO($con);
			$o_usuario = $o_usuarioDAO->buscarPorId($o_usuario);
				
			$o_perfil->setId($row->idperfil);
			$o_perfilDAO = new PerfilDAO($con);
			$o_perfil = $o_perfilDAO->buscarPorId($o_perfil);
				
			$o_sistema->setId($row->idsistema);
			$o_sistemaDAO = new SistemaDAO($con);
			$o_sistema = $o_sistemaDAO->buscarPorId($o_sistema);
				
			$o_opcoes->setId($row->idopcoes);
			$o_opcoesDAO = new OpcoesDAO($con);
			$o_opcoes = $o_opcoesDAO->buscarPorId($o_opcoes);
				
			$o_acesso = new Acesso($o_usuario, $o_perfil, $o_sistema,
					$o_opcoes, $row->visualizar, $row->cadastrar, $row->consultar,
					$row->atualizar, $row->deletar, $row->datacadastro, $row->dataatualizacao);
			array_push($this->v_o_acesso, $o_acesso);
		}
		return $this->v_o_acesso;
		
		mysqli_close($this->con);
	}
	
	function buscarPorSistema($o_acesso){
		$this->sql= "select * from acesso where idsistema= '" . $o_acesso->getOSistema()->getId() . "'";
		$query = mysqli_query($this->con, $this->sql);
		if (!$query) {
			die('Error: ' . mysqli_error($this->con));
		}
		$o_usuario = new Usuario();
		$o_perfil = new Perfil();
		$o_sistema = new Sistema();
		$o_opcoes = new Opcoes();
	
		$conexao = new Conexao();
		$con = $conexao->getConnection();
	
		while($row = mysqli_fetch_object($query)){
			$o_usuario->setId($row->idusuario);
			$o_usuarioDAO = new UsuarioDAO($con);
			$o_usuario = $o_usuarioDAO->buscarPorId($o_usuario);
				
			$o_perfil->setId($row->idperfil);
			$o_perfilDAO = new PerfilDAO($con);
			$o_perfil = $o_perfilDAO->buscarPorId($o_perfil);
				
			$o_sistema->setId($row->idsistema);
			$o_sistemaDAO = new SistemaDAO($con);
			$o_sistema = $o_sistemaDAO->buscarPorId($o_sistema);
				
			$o_opcoes->setId($row->idopcoes);
			$o_opcoesDAO = new OpcoesDAO($con);
			$o_opcoes = $o_opcoesDAO->buscarPorId($o_opcoes);
				
			$o_acesso = new Acesso($row->id, $o_usuario, $o_perfil, $o_sistema,
					$o_opcoes, $row->visualizar, $row->cadastrar, $row->consultar,
					$row->atualizar, $row->deletar, $row->datacadastro, $row->dataatualizacao);
			array_push($this->v_o_acesso, $o_acesso);
		}
		return $this->v_o_acesso;

		mysqli_close($this->con);
	}

}
?>