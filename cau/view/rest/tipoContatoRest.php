<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/TipoContatoControl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" .'model/bean/TipoContato.php';

switch ($_SERVER['REQUEST_METHOD']) {
	
		case 'GET':
			listaTipoContato();
			break;
	
		case 'POST':
			cadastraTipoContato();
			break;
	
		case 'PUT':
			atualizaTipoContato();
			break;
				
		case 'DELETE':
			deletaTipoContato();
			break;
}
	
function listaTipoContato() {
	
	$start = $_REQUEST['start'];
	$limit = $_REQUEST['limit'];
	

	$o_tipoContatoControl = new TipoContatoControl();
	$v_o_tipoContato = $o_tipoContatoControl->listarTodos();
	
	foreach ($v_o_tipoContato as $o_tipoContato) {
		$v_registros[] = $o_tipoContato;
	}
	
	$o_tipoContatoControl = new TipoContatoControl();
// 	$totalRegistro = $o_tipoContatoControl->qtdTotal();
	$totalRegistro = 2;
	
	
	// encoda para formato JSON
	echo json_encode(array(
			"success" => 0,
			"total" => $totalRegistro,
			"data" => $v_registros
	));
	
}

function cadastraTipoContato() {
	
	$jsonDados = $_POST['data'];
	$data = json_decode(stripslashes($jsonDados));
	
	$datahora = date("Y-m-d H:i:s");
	$o_tipoContato = new TipoContato();
	$o_tipoContato->setDescricao($data->descricao);
	$o_tipoContato->setDataCadastro($datahora);
	$o_tipoContato->setDataAtualizacao($datahora);
	
	$o_tipoContatoControl = new TipoContatoControl($o_tipoContato);
	$o_tipoContatoControl->cadastrar();
	
	$o_tipoContato->setId($o_tipoContatoControl->getUltimoId());
	
	
	// encoda para formato JSON
	echo json_encode(array(
			"success" => 0,
			"data" => $o_tipoContato
	));
	
}

function atualizaTipoContato() {
	
	$datahora = date("Y-m-d H:i:s");
	parse_str(file_get_contents("php://input"), $post_vars);
	$jsonDados = $post_vars['data'];
	$data = json_decode(stripslashes($jsonDados));
	
	$o_tipoContato = new TipoContato($data->id, $data->descricao, $datahora,$datahora );
	
	$o_tipoContatoControl = new TipoContatoControl($o_tipoContato);
	$o_tipoContatoControl->atualizar();
	
}

function deletaTipoContato() {
	
	parse_str(file_get_contents("php://input"), $post_vars);
	$jsonDados = $post_vars['data'];
	$data = json_decode(stripslashes($jsonDados));
		
	$id = $data->id;
	
	$o_tipoContato = new TipoContato();
	$o_tipoContato->setId($id);
	
	$o_tipoContatoControl = new TipoContatoControl($o_tipoContato);
	$o_tipoContatoControl->deletar();
	
}

?>