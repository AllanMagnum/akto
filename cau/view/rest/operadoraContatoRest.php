<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/OperadoraContatoControl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" .'model/bean/OperadoraContato.php';

switch ($_SERVER['REQUEST_METHOD']) {
	
		case 'GET':
			listaOperadoraContato();
			break;
	
		case 'POST':
			cadastraOperadoraContato();
			break;
	
		case 'PUT':
			atualizaOperadoraContato();
			break;
				
		case 'DELETE':
			deletaOperadoraContato();
			break;
}
	
function listaOperadoraContato() {
	
	$start = $_REQUEST['start'];
	$limit = $_REQUEST['limit'];
	

	$o_operadoraContatoControl = new OperadoraContatoControl();
	$v_o_operadoraContato = $o_operadoraContatoControl->listarTodos();
	
	foreach ($v_o_operadoraContato as $o_operadoraContato) {
		$v_registros[] = $o_operadoraContato;
	}
	
	$o_operadoraContatoControl = new OperadoraContatoControl();
// 	$totalRegistro = $o_operadoraContatoControl->qtdTotal();
	$totalRegistro = 3;
	
	
	// encoda para formato JSON
	echo json_encode(array(
			"success" => 0,
			"total" => $totalRegistro,
			"data" => $v_registros
	));
	
}

function cadastraOperadoraContato() {
	
	$jsonDados = $_POST['data'];
	$data = json_decode(stripslashes($jsonDados));
	
	$datahora = date("Y-m-d H:i:s");
	$o_operadoraContato = new OperadoraContato();
	$o_operadoraContato->setDescricao($data->descricao);
	$o_operadoraContato->setDataCadastro($datahora);
	$o_operadoraContato->setDataAtualizacao($datahora);
	
	$o_operadoraContatoControl = new OperadoraContatoControl($o_operadoraContato);
	$o_operadoraContatoControl->cadastrar();
	
	$o_operadoraContato->setId($o_operadoraContatoControl->getUltimoId());
	
	
	// encoda para formato JSON
	echo json_encode(array(
			"success" => 0,
			"data" => $o_operadoraContato
	));
	
}

function atualizaOperadoraContato() {
	
	$datahora = date("Y-m-d H:i:s");
	parse_str(file_get_contents("php://input"), $post_vars);
	$jsonDados = $post_vars['data'];
	$data = json_decode(stripslashes($jsonDados));
	
	$o_operadoraContato = new OperadoraContato($data->id, $data->descricao, $datahora,$datahora );
	
	$o_operadoraContatoControl = new OperadoraContatoControl($o_operadoraContato);
	$o_operadoraContatoControl->atualizar();
	
}

function deletaOperadoraContato() {
	
	parse_str(file_get_contents("php://input"), $post_vars);
	$jsonDados = $post_vars['data'];
	$data = json_decode(stripslashes($jsonDados));
		
	$id = $data->id;
	
	$o_operadoraContato = new OperadoraContato();
	$o_operadoraContato->setId($id);
	
	$o_operadoraContatoControl = new OperadoraContatoControl($o_operadoraContato);
	$o_operadoraContatoControl->deletar();
	
}

?>