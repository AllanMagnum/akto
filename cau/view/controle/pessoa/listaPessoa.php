<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/PessoaFisicaControl.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" .'model/bean/PessoaFisica.php';

$start = $_REQUEST['start'];
$limit = $_REQUEST['limit'];

$o_pessoaFisicaControl = new PessoaFisicaControl();
$v_o_pessoaFisica = $o_pessoaFisicaControl->listarPaginado($start, $limit);

foreach ($v_o_pessoaFisica as $o_pessoaFisica) {
	$v_registros[] =json_encode($o_pessoaFisica);
}

$o_pessoaFisicaControl = new PessoaFisicaControl();
$totalRegistro = $o_pessoaFisicaControl->qtdTotal();


// encoda para formato JSON
echo json_encode(array(
		"success" => 0,
		"total" => $totalRegistro,
		"data" => $v_registros
));

?>