<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/PessoaControl.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" .'model/bean/Pessoa.php';

//$start = $_REQUEST['start'];
//$limit = $_REQUEST['limit'];

$o_pessoaControl = new PessoaControl ();
$v_pessoas = $o_pessoaControl->listarPaginado(1, 25);

foreach ($v_pessoas as $o_pessoa) {
	$v_registros[] = $o_pessoa->toJson();
}

$o_pessoaControl = new PessoaControl ();
echo $totalRegistro = $o_pessoaControl->qtdTotal();


// encoda para formato JSON
echo json_encode(array(
		"success" => 0,
		"total" => $totalRegistro,
		"data" => $v_registros
));

?>