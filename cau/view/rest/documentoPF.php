<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/DocumentoPFControl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" .'model/bean/DocumentoPF.php';

switch ($_SERVER['REQUEST_METHOD']) {
	
		case 'GET':
			listaDocumentoPF();
			break;
	
		case 'POST':
			cadastraDocumentoPF();
			break;
	
		case 'PUT':
			atualizaDocumentoPF();
			break;
				
		case 'DELETE':
			deletaDocumentoPF();
			break;
}
	
function listaDocumentoPF() {
	
	$o_pessoaFisica = new PessoaFisica();
	$o_pessoaFisica->setId(1);
	$o_documentoPF = new DocumentoPF();
	$o_documentoPF->setOPessoaFisica($o_pessoaFisica);
	$o_documentoPFControl = new DocumentoPFControl($o_documentoPF);
	$v_o_documentoPF = $o_documentoPFControl->listarPorPessoa();
	foreach ($v_o_documentoPF as $o_documentoPF) {
		$v_registros[] = $o_documentoPF;
	}
	
	$o_documentoPFControl = new DocumentoPFControl();
// 	$totalRegistro = $o_enderecoPFControl->qtdTotal();
	$totalRegistro = 1;
	
	// encoda para formato JSON
	echo json_encode(array(
			"success" => 0,
			"total" => $totalRegistro,
			"data" => $v_registros
	));
	
}

function cadastraDocumentoPF() {
	
	$jsonDados = $_POST['data'];
	$data = json_decode(stripslashes($jsonDados));
	
	$datahora = date("Y-m-d H:i:s");
	
	$o_pessoaFisica = new PessoaFisica();
	$o_pessoaFisica->setId(1);
	
	//------
	$o_documentoPF = new DocumentoPF();
	$o_documentoPF->setEnumTipo($data->enum_tipo);
	$o_documentoPF->setNumero($data->numero);
	$o_documentoPF->setDataEmissao($datahora);
	$o_documentoPF->setOrgaoEmissor($data->orgaoEmissor);
	$o_documentoPF->setVia($data->via);
	$o_documentoPF->setOPessoaFisica($o_pessoaFisica);
	$o_documentoPF->setDataCadastro($datahora);
	$o_documentoPF->setDataAtualizacao($datahora);
	
	$o_documentoPFControl = new DocumentoPFControl($o_documentoPF);
	$o_documentoPFControl->cadastrar();
	
	$o_documentoPF->setId($o_documentoPFControl->getUltimoId());

	// encoda para formato JSON
	echo json_encode(array(
			"success" => 0,
			"data" => $o_documentoPF
	));
	
}

function atualizaDocumentoPF() {
	
	parse_str(file_get_contents("php://input"), $post_vars);
	$jsonDados = $post_vars['data'];
	$data = json_decode(stripslashes($jsonDados));
	
// 	$o_pessoaFisica = new PessoaFisica($data->id, $data->nome, $data->cpf, "1987-03-14 00:00:00", $data->enum_estadoCivil,
// 			$data->enum_sexo,$data->nomePai, $data->nomeMae, $data->enum_cor, $data->naturalidade, $data->nacionalidade, "1987-03-14 00:00:00","1987-03-14 00:00:00" );
	
// 	$o_pessoaFisicaControl = new PessoaFisicaControl($o_pessoaFisica);
// 	$o_pessoaFisicaControl->atualizar();
	
}

function deletaDocumentoPF() {
	
	parse_str(file_get_contents("php://input"), $post_vars);
	$jsonDados = $post_vars['data'];
	$data = json_decode(stripslashes($jsonDados));
		
	$id = $data->id;
	
	$o_documentoPF = new DocumentoPF();
	$o_documentoPF->setId($id);
	
	$o_documentoPFControl = new DocumentoPFControl($o_pessoaFisica);
	$o_documentoPFControl->deletar();
	
}

?>