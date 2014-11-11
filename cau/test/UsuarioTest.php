<?php
include_once '../model/bean/Usuario.php';
include_once '../model/bean/Pessoa.php';
include_once '../control/PessoaControl.php';
include_once '../model/bean/Perfil.php';
include_once '../control/PerfilControl.php';
include_once '../control/UsuarioControl.php';

$datahora = date ( "Y-m-d H:i:s" );

// deve cadastrar usuario allan ligado a pessoa allan(id=1) e ao perfil basico(id=1)
try {
	echo "<font color=\'#FF0000\'> deve cadastrar usuario allan ligado a pessoa allan(id=1) e ao perfil basico(id=1) </font>";
	echo '<br>';
	$o_pessoa = new Pessoa();
	$o_pessoa->setId(1);
	
	$o_pessoaControl = new PessoaControl($o_pessoa);
	$o_pessoa = $o_pessoaControl->buscarPorId();
	
	$o_perfil = new Perfil();
	$o_perfil->setId(1);
	
	$o_perfilControl = new PerfilControl($o_perfil);
	$o_perfil = $o_perfilControl->buscarPorId();
	
	$o_usuario = new Usuario ();
	$o_usuario->setLogin ( 'allan' );
	$o_usuario->setSenha ( '12345' );
	$o_usuario->setOPerfil ( $o_perfil );
	$o_usuario->setOPessoa ( $o_pessoa );
	$o_usuario->setDataCadastro ( $datahora );
	$o_usuario->setDataAtualizacao ( "0000-00-00 00:00:00" );
	
	$o_usuarioControl = new UsuarioControl($o_usuario);
	$o_usuarioControl->cadastrar();
	
	echo "Usuario cadastrado sem erros";
	echo "<br>";
	echo "<br>";
} catch ( Exception $e ) {
	echo "teste falhou: " . $e->getMessage();
}

//deve pesquisar e encontrar usuario com id = 1
try {
	echo "<font color=\'#FF0000\'> deve pesquisar e encontrar usuario com id = 1 </font>";
	echo '<br>';
	
	$o_usuario = new Usuario();
	$o_usuario->setId(1);
	
	$o_usuarioControl = new UsuarioControl($o_usuario);
	echo $o_usuarioControl->buscarPorId();
	echo "<br>";
	echo "<br>";
	 
} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}

//deve atualizar senha do usuario com o id = 1
try {
	echo "<font color=\'#FF0000\'> deve atualizar senha do usuario com o id = 1 </font>";
	echo '<br>';
	
	$o_usuario = new Usuario();
	$o_usuario->setId(1);
	
	$o_usuarioControl = new UsuarioControl($o_usuario);
	$o_usuario = $o_usuarioControl->buscarPorId();
	
	$o_usuario->setSenha('54321');
	
	$o_usuarioControl = new UsuarioControl($o_usuario);
	$o_usuarioControl->atualizar();
	
	$o_usuarioControl = new UsuarioControl($o_usuario);
	echo $o_usuarioControl->buscarPorId();
	echo "<br>";
	echo "<br>";
	
} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}

//deve validar pessoa allan com login = allan e senha = 12345(false) e senha = 54321(true)
try {
	echo "<font color=\'#FF0000\'> deve validar pessoa allan com login = allan e senha = 12345(false) e senha = 54321(true) </font>";
	echo '<br>';
	
	$o_usuario = new Usuario();
	$o_usuario->setLogin("allan");
	
	$o_usuarioControl = new UsuarioControl($o_usuario);
	$resposta = $o_usuarioControl->autenticar();
	
	echo "a reposta para login = allan e senha = 12345 e: " . $resposta;
	echo "<br>";
	
	$o_usuario = new Usuario();
	$o_usuario->setLogin("allan");
	$o_usuario->setSenha("54321");
	
	$o_usuarioControl = new UsuarioControl($o_usuario);
	$resposta = $o_usuarioControl->autenticar();
	
	echo "a reposta para login = allan e senha = 54321 e: " . $resposta;
	echo "<br>";
	echo "<br>";
} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}

//deve listar todos os usuarios cadastrados
try {
	echo "<font color=\'#FF0000\'> deve listar todos os usuarios cadastrados </font>";
	echo '<br>';
	
	$o_usuarioControl = new UsuarioControl();
	$v_o_usuario = $o_usuarioControl->listarTodos();
	
	foreach ($v_o_usuario as $o_usuario) {
		echo $o_usuario;
	}
	echo "<br>";
	echo "<br>";
} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}

/* //deve deletar o usario com o id = 1
try {
	echo "<font color=\'#FF0000\'> deve deletar o usario com o id = 1 </font>";
	echo '<br>';
	
	$o_usuario = new Usuario();
	$o_usuario->setId(1);
	
	$o_usuarioControl = new UsuarioControl($o_usuario);
	$o_usuarioControl->deletar();
	
	echo "usuario deletado";
	
} catch (Exception $e) {
} */
?>