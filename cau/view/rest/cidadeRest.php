<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/CidadeControl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" .'model/bean/Cidade.php';

switch ($_SERVER['REQUEST_METHOD']) {

	case 'GET':
		listaCidade();
		break;

	case 'POST':
		break;

	case 'PUT':
		break;

	case 'DELETE':
		break;
}

function listaCidade() {
	
	$v_registros = array();
	
	$o_cidadeControl = new CidadeControl();
	$v_o_cidade = $o_cidadeControl->listarTodos();
	
	foreach ($v_o_cidade as $o_cidade) {
		$v_registros[] = $o_cidade;
	}
	
	$totalRegistro = 1;

	// encoda para formato JSON
	echo json_encode(array(
			"success" => 0,
			"total" => $totalRegistro,
			"data" => $v_registros
	));

}