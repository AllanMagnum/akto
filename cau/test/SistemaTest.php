<?php
include_once '../model/bean/Sistema.php';
include_once '../control/SistemaControl.php';
include_once '../model/bean/Opcoes.php';
include_once '../control/OpcoesControl.php';

// deve cadastrar o sistema cau 
echo "<font color=\'#FF0000\'> deve cadastrar o sistema cau </font>";
echo '<br>';
$datahora = date("Y-m-d H:i:s");

try {
	
	$o_sistema = new Sistema();
	$o_sistema->setNome("controle e autenticacao de usuario");
	$o_sistema->setSigla("cau");
	$o_sistema->setDataCadastro($datahora);
	$o_sistema->setDataAtualizacao("0000-00-00 00:00:00");
	
	$o_sistemaControl = new SistemaControl($o_sistema);
	$o_sistemaControl->cadastrar();

	echo "Sistema cadastrado com sucesso!";
	
	echo '<br>';
	echo '<br>';
	
} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}

//deve pesquisar e encontra sistema com id = 1
echo "<font color=\'#FF0000\'> deve pesquisar e econtra sistema com id = 1 </font>";
echo '<br>';

try {
	$o_sistema = new Sistema();
	$o_sistema->setId(1);
	
	$o_sistemaControl = new SistemaControl($o_sistema);
	echo $o_sistemaControl->buscarPorId();
	
	echo '<br>';
	echo '<br>';
} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}

//deve pesquisar e encontrar sistema com id = 1 e atualizar a data de atualizacao 
echo "<font color=\'#FF0000\'> deve pesquisar e encontrar sistema com id = 1 e atualizar a data de atualizacao </font>";
echo '<br>';

try {
	
	$o_sistema = new Sistema();
	$o_sistema->setId(1);
	
	$o_sistemaControl = new SistemaControl($o_sistema);
	$o_sistema = $o_sistemaControl->buscarPorId();
	$o_sistema->setDataAtualizacao($datahora);
	
	$o_sistemaControl = new SistemaControl($o_sistema);
	$o_sistemaControl->atualizar();
	
	$o_sistemaControl = new SistemaControl($o_sistema);
	echo $o_sistemaControl->buscarPorId();
	
	echo '<br>';
	echo '<br>';
	
} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}

//deve perquisar e encontrar o sistema com id = 1 e deletar o mesmo
echo "<font color=\'#FF0000\'> deve perquisar e encontrar o sistema com id = 1 e deletar o mesmo </font>";
echo '<br>';

try {
	$o_sistema = new Sistema();
	$o_sistema->setId(1);
	
	$o_sistemaControl = new SistemaControl($o_sistema);
	$o_sistema = $o_sistemaControl->buscarPorId();
	
	$o_sistemaControl = new SistemaControl($o_sistema);
	$o_sistemaControl->deletar();
	
	echo "sistema deletado com sucesso";
	
} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}
?>