<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Perfil.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/PerfilControl.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/PerfilDAO.php';

//cadastrar perfil "Basico"
echo "<font color=\'#FF0000\'> deve cadastrar perfil basico </font>";
echo '<br>';
$datahora = date("Y-m-d H:i:s");

try {
	$o_perfil = new Perfil();
	$o_perfil->setNome("Basico");
	$o_perfil->setDataCadastro($datahora);
	$o_perfil->setDataAtualizacao("0000-00-00 00:00:00");
	
	$o_perfilControl = new PerfilControl($o_perfil);
	$o_perfilControl->cadastrar();
	
	echo $o_perfil;
	
	echo '<br>';
	echo '<br>';
	
} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}

//deve perquisar e encontrar perfil com id = 1
echo "<font color=\'#FF0000\'> deve perquisar e encontrar perfil com id = 1 </font>";
echo '<br>';

try {
	$o_perfil = new Perfil();
	$o_perfil->setId(1);

	$o_perfilControl = new PerfilControl($o_perfil);
	echo $o_perfilControl->buscarPorId();

	echo '<br>';
	echo '<br>';
} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}

//deve perquisar e encontrar perfil com id = 1 e atualizar a data de atualizacao do perfil
echo "<font color=\'#FF0000\'> deve perquisar e encontrar perfil com id = 1 e atualizar a data de atualizacao do perfil </font>";
echo '<br>';

try {
	$o_perfil = new Perfil();
	$o_perfil->setId(1);

	$o_perfilControl = new PerfilControl($o_perfil);
	$o_perfilAtualizado = $o_perfilControl->buscarPorId();
	$o_perfilAtualizado->setDataAtualizacao($datahora);

	$o_perilControl_2 = new PerfilControl($o_perfilAtualizado);
	$o_perilControl_2->atualizar();

	echo $o_perfilAtualizado;

	echo '<br>';
	echo '<br>';
} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}

//deve perquisar e encontrar perfil com id = 1 e deletar o mesmo
echo "<font color=\'#FF0000\'> deve perquisar e encontrar perfil com id = 1 e deletar o mesmo </font>";
echo '<br>';

try {
	$o_perfil = new Perfil();
	$o_perfil->setId(1);

	$o_perfilControl = new PerfilControl($o_perfil);
	$o_perfilParaDeletar = $o_perfilControl->buscarPorId();

	$o_perilControl_2 = new PerfilControl($o_perfilParaDeletar);
	$o_perilControl_2->deletar();
} catch (Exception $e) {
	echo "teste falhou: " . $e->getMessage();
}

?>