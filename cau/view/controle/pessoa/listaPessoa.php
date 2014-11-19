<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/PessoaControl.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" .'model/bean/Pessoa.php';

$o_pessoaControl = new PessoaControl();
$v_o_pessoa = $o_pessoaControl->listarTodos();

foreach ($v_o_pessoa as $o_pessoa) {
	$v_json[] = $o_pessoa->toJson();
}

echo json_encode(array('pessoa' => $v_json));

?>