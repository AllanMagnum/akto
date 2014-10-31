<?php
include_once '../model/bean/Usuario.php';
include_once '../model/bean/Pessoa.php';
include_once '../model/bean/Perfil.php';
include_once '../control/UsuarioControl.php';
include_once '../model/dao/UsuarioDAO.php';

$datahora = date ( "Y-m-d H:i:s" );

// cadastrar usuario allan ligado a pessoa allan e ao perfil basico
try {
	echo "<font color=\'#FF0000\'> cadastrar usuario allan ligado a pessoa allan e ao perfil basico </font>";
	echo '<br>';
	$o_pessoa = new Pessoa ();
	$o_pessoa->setId ( 1 );
	
	$o_perfil = new Perfil ();
	$o_perfil->setId ( 1 );
	
	$o_usuario = new Usuario ();
	$o_usuario->setLogin ( 'allan' );
	$o_usuario->setSenha ( base64_encode ( '12345' ) );
	$o_usuario->setOPerfil ( $o_perfil );
	$o_usuario->setOPessoa ( $o_pessoa );
	$o_usuario->setDataCadastro ( $datahora );
	$o_usuario->setDataAtualizacao ( "0000-00-00 00:00:00" );
	
	$o_usuarioControl = new UsuarioControl ( $o_usuario );
	$o_usuarioControl->cadastrar ();
	
	echo "Usuario cadastrado sem erros";
	echo "<br>";
	echo "<br>";
} catch ( Exception $e ) {
	echo "teste falhou: " . $e;
}

//Buscar usuario por login = 'allan'
?>