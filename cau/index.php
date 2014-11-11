<!DOCTYPE html>
<?php
 include_once 'control/UsuarioControl.php';
 include_once 'model/bean/Usuario.php';
 include_once 'model/dao/UsuarioDAO.php';
 if (isset( $_POST ['acao'])) {
	$o_usuario = new Usuario();
	$o_usuario->setLogin($_POST ['txtUsuario']);
	$o_usuario->setSenha($_POST ['txtSenha']);
	

	$o_usuarioControl = new UsuarioControl($o_usuario);
	$resposta=$o_usuarioControl->autenticar();
	
	if ($resposta==1) {
		session_start();
		$_SESSION['usuarioLogin'] = $_POST ['txtUsuario'];
		header("Location: view/app.php");
	}
	
 }
?>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Sistema AKTO - Usuário Logado : </title>
  <link rel="stylesheet" href="resources/css/style.css">
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Login de Acesso</h1>
      <form method="post" >
        <p><input type="text" name="txtUsuario" value="" placeholder="Digite o Login"></p>
        <p><input type="password" name="txtSenha" value="" placeholder="Digite a Senha"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Lembre-me a Senha nesse Computador
          </label>
        </p>
			<input type='hidden' name='acao' value='validar'>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>

    <div class="login-help">
      <p>Esqueceu a Senha? <a href="index.php">Clique aqui para resetar</a>.</p>
    </div>
  </section>

</body>
</html>
