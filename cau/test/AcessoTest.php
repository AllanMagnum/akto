<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Usuario.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Pessoa.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Sistema.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Acesso.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/AcessoControl.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/SistemaControl.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/PessoaControl.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Perfil.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/PerfilControl.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/UsuarioControl.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/UsuarioDAO.php';

$datahora = date ( "Y-m-d H:i:s" );

// deve cadastrar usuario allan ligado ao perfil basico(id=1) no sistema cau(id=1) e nas opcoes pessoa(id=1) e usuario(id=2) apenas podendo visualizar e consultar
echo "<font color=\'#FF0000\'> deve cadastrar usuario allan ligado a pessoa allan(id=1) e ao perfil basico(id=1) no sistema cau(id=1) e nas opcoes pessoa(id=1) e usuario(id=2) apenas podendo visualizar e consultar </font>";
echo '<br>';
try {
	$o_usuario = new Usuario();
	$o_usuario->setId(1);
	
	$o_usuarioControl = new UsuarioControl($o_usuario);
	$o_usuario = $o_usuarioControl->buscarPorId();
	
	$o_sistema = new Sistema();
	$o_sistema->setId(1);
	
	$o_sistemaControl = new SistemaControl($o_sistema);
	$o_sistema = $o_sistemaControl->buscarPorId();
	
	$o_sistemaControl = new SistemaControl($o_sistema);
	$v_o_opcoes = $o_sistemaControl->listarOpcoes();
	
	foreach ($v_o_opcoes as $o_opcoes) {
		$o_acesso = new Acesso($o_usuario, $o_usuario->getOPerfil(), $o_sistema, $o_opcoes, 1, 0, 1, 0, 0, $datahora, "0000-00-00 00:00:00");
		
		$o_acessoControl = new AcessoControl($o_acesso);
		$o_acessoControl->cadastrar();
	}
	
	echo "acessos cadastrados com sucesso";
	echo "<br>";
	echo "<br>";
	
} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}

// deve listar todos os acessos cadastrados para o usuario allan idusuario=1
echo "<font color=\'#FF0000\'> deve listar todos os acessos cadastrados para o usuario allan idusuario=1 </font>";
echo '<br>';
try {
	$o_usuario = new Usuario();
	$o_usuario->setId(1);
	
	$o_acesso = new Acesso();
	$o_acesso->setOUsuario($o_usuario);
	
	$o_acessoControl = new AcessoControl($o_acesso);
	$v_o_acesso = $o_acessoControl->buscarPorUsuario();
	
	
	foreach ($v_o_acesso as $o_acesso) {
		echo $o_acesso;
		echo "<br>";
	}
	
	echo "<br>";
	echo "<br>";
	
} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}

// deve listar todos os acessos cadastrados para o perfil basico idperfil=1
echo "<font color=\'#FF0000\'> deve listar todos os acessos cadastrados para o perfil basico idperfil=1 </font>";
echo '<br>';
try {
	$o_perfil = new Perfil();
	$o_perfil->setId(1);

	$o_acesso = new Acesso();
	$o_acesso->setOPerfil($o_perfil);

	$o_acessoControl = new AcessoControl($o_acesso);
	$v_o_acesso = $o_acessoControl->buscarPorPerfil();

	foreach ($v_o_acesso as $o_acesso) {
		echo $o_acesso;
		echo "<br>";
	}
	echo "<br>";
	echo "<br>";

} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}

// deve listar todos os acessos cadastrados para o sistema cau idsistema=1
echo "<font color=\'#FF0000\'> deve listar todos os acessos cadastrados para o sistema cau idsistema=1 </font>";
echo '<br>';
try {
	$o_sistema = new Sistema();
	$o_sistema->setId(1);

	$o_acesso = new Acesso();
	$o_acesso->setOSistema($o_sistema);

	$o_acessoControl = new AcessoControl($o_acesso);
	$v_o_acesso = $o_acessoControl->buscarPorSistema();

	foreach ($v_o_acesso as $o_acesso) {
		echo $o_acesso;
		echo "<br>";
	}
	echo "<br>";
	echo "<br>";

} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}

// deve atualizar todos os acessos do usuario allan(id=1) para poder cadatrar
echo "<font color=\'#FF0000\'> deve atualizar todos os acessos do usuario allan(id=1) para poder cadatrar </font>";
echo '<br>';
try {
	$o_usuario = new Usuario();
	$o_usuario->setId(1);
	
	$o_acesso = new Acesso();
	$o_acesso->setOUsuario($o_usuario);
	
	$o_acessoControl = new AcessoControl($o_acesso);
	$v_o_acesso = $o_acessoControl->buscarPorUsuario();
	
	foreach ($v_o_acesso as $o_acesso) {
		$o_acesso->setCadastrar(1);
		$o_acesso->setDataAtualizacao($datahora);
		$o_acessoControl = new AcessoControl($o_acesso);
		$o_acessoControl->atualizar();
	}
	
	echo "acesso atualizado com sucesso";
	echo "<br>";
	echo "<br>";
} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}

// deve atualizar todos os acessos do perfil basico(id=1) para poder atualizar 
echo "<font color=\'#FF0000\'> deve atualizar todos os acessos do perfil basico(id=1) para poder atualizar </font>";
echo '<br>';
try {
	$o_perfil = new Perfil();
	$o_perfil->setId(1);
	
	$o_acesso = new Acesso();
	$o_acesso->setOPerfil($o_perfil);
	
	$o_acessoControl = new AcessoControl($o_acesso);
	$v_o_acesso = $o_acessoControl->buscarPorPerfil();
	
	foreach ($v_o_acesso as $o_acesso) {
		$o_acesso->setAtualizar(1);
		$o_acesso->setDataAtualizacao($datahora);
		$o_acessoControl = new AcessoControl($o_acesso);
		$o_acessoControl->atualizar();
	}
	
	echo "acesso atualizado com sucesso";
	echo "<br>";
	echo "<br>";
} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}
?>