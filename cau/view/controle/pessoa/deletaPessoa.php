<?php
	//chama o arquivo de conexão com o bd
	include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/PessoaFisicaControl.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" .'model/bean/PessoaFisica.php';

	$jsonDados = $_POST['data'];

	$data = json_decode(stripslashes($jsonDados));

	$id = $data->id;

	$o_pessoaFisica = new PessoaFisica();
	$o_pessoaFisica->setId($id);
	
	$o_pessoaFisicaControl = new PessoaFisicaControl($o_pessoaFisica);
	$o_pessoaFisicaControl->deletar();
	
// 	echo json_encode(array(
// 		"success" => mysql_errno() == 0
// 	));
?>