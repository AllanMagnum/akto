<?php
include_once '../model/bean/Opcoes.php';
include_once '../model/bean/Sistema.php';
include_once '../control/OpcoesControl.php';
include_once '../control/SistemaControl.php';

//deve cadastrar a ocpcao pessoa e usuario no sistema cau
echo "<font color=\'#FF0000\'> deve cadastrar a ocpcao pessoa do sistema cau </font>";
echo '<br>';
$datahora = date("Y-m-d H:i:s");

try {
	
	$o_sistema = new Sistema();
	$o_sistema->setId(1);
	
	$o_sistemaControl = new SistemaControl($o_sistema);
	$o_sistema = $o_sistemaControl->buscarPorId();
	
	$o_opcoes = new Opcoes();
	$o_opcoes->setNome("pessoa");
	$o_opcoes->setTipo("classe");
	$o_opcoes->setUrl("cau/view/pessoa");
	$o_opcoes->setOSistema($o_sistema);
	$o_opcoes->setDataCadastro($datahora);
	$o_opcoes->setDataAtualizacao("0000-00-00 00:00:00");
	
	$o_opcoesControl = new OpcoesControl($o_opcoes);
	$o_opcoesControl->cadastrar();
	
	$o_opcoes_2 = new Opcoes();
	$o_opcoes_2->setNome("usuario");
	$o_opcoes_2->setTipo("classe");
	$o_opcoes_2->setUrl("cau/view/usuario");
	$o_opcoes_2->setOSistema($o_sistema);
	$o_opcoes_2->setDataCadastro($datahora);
	$o_opcoes_2->setDataAtualizacao("0000-00-00 00:00:00");
	
	$o_opcoesControl = new OpcoesControl($o_opcoes);
	$o_opcoesControl->cadastrar();
	
	echo "opcoes cadastradas com sucesso";
	echo "<br>";
	echo "<br>";
	
} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}

//deve pesquisar e encontrar a ocpcao pessoa e usuario no sistema cau com id = 1 e id = 2 respectivamente
echo "<font color=\'#FF0000\'> deve pesquisar e encontrar a ocpcao pessoa e usuario no sistema cau com id = 1 e id = 2 respectivamente </font>";
echo '<br>';

try {
	$o_opcoes = new Opcoes();
	$o_opcoes->setId(1);
	
	$o_opcoesControl = new OpcoesControl($o_opcoes);
	echo $o_opcoesControl->buscarPorId();
	echo "<br>";
	echo "<br>";
	
	$o_opcoes = new Opcoes();
	$o_opcoes->setId(2);
	
	$o_opcoesControl = new OpcoesControl($o_opcoes);
	echo $o_opcoesControl->buscarPorId();
	echo "<br>";
	echo "<br>";
} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}

//deve pesquisar e encontrar a ocpcao pessoa e usuario no sistema cau com id = 1 e id = 2 respectivamente e atualizar a data de atualizacao de ambos
echo "<font color=\'#FF0000\'> deve pesquisar e encontrar a ocpcao pessoa e usuario no sistema cau com id = 1 e id = 2 respectivamente e atualizar a data de atualizacao de ambos </font>";
echo '<br>';

try {
	$o_opcoes = new Opcoes();
	$o_opcoes->setId(1);
	
	$o_opcoesControl = new OpcoesControl($o_opcoes);
	$o_opcoes = $o_opcoesControl->buscarPorId();
	$o_opcoes->setDataAtualizacao($datahora);
	
	$o_opcoesControl = new OpcoesControl($o_opcoes);
	$o_opcoesControl->atualizar();
	
	echo $o_opcoes;
	echo "<br>";
	echo "<br>";
	
	$o_opcoes = new Opcoes();
	$o_opcoes->setId(2);
	
	$o_opcoesControl = new OpcoesControl($o_opcoes);
	$o_opcoes = $o_opcoesControl->buscarPorId();
	$o_opcoes->setDataAtualizacao($datahora);
	
	$o_opcoesControl = new OpcoesControl($o_opcoes);
	$o_opcoesControl->atualizar();
	
	echo $o_opcoes;
	echo "<br>";
	echo "<br>";
} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}

//deve pesquisar e encontrar a ocpcao pessoa e usuario no sistema cau com id = 1 e id = 2 respectivamente e deletar ambos
echo "<font color=\'#FF0000\'> deve pesquisar e encontrar a ocpcao pessoa e usuario no sistema cau com id = 1 e id = 2 respectivamente e atualizar a data de atualizacao de ambos </font>";
echo '<br>';
try {
	$o_opcoes = new Opcoes();
	$o_opcoes->setId(1);
	
	$o_opcoesControl = new OpcoesControl($o_opcoes);
	$o_opcoesControl->deletar();
	
	$o_opcoes = new Opcoes();
	$o_opcoes->setId(2);
	
	$o_opcoesControl = new OpcoesControl($o_opcoes);
	$o_opcoesControl->deletar();
	
	echo "opcoes deletadas com sucesso";
} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}

?>