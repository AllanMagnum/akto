<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/ContatoPFControl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" .'model/bean/ContatoPF.php';

switch ($_SERVER['REQUEST_METHOD']) {
	
		case 'GET':
			listaContatoPF();
			break;
	
		case 'POST':
			cadastraContatoPF();
			break;
	
		case 'PUT':
			atualizaContatoPF();
			break;
				
		case 'DELETE':
			deletaContatoPF();
			break;
}
	
function listaContatoPF() {
	
	$o_pessoaFisica = new PessoaFisica();
	$o_pessoaFisica->setId(1);
	$o_contatoPF = new ContatoPF();
	$o_contatoPF->setOPessoaFisica($o_pessoaFisica);
	$o_contatoPFControl = new ContatoPFControl($o_contatoPF);
	$v_o_contatoPF = $o_contatoPFControl->listarPorPessoa();
	foreach ($v_o_contatoPF as $o_contatoPF) {
		$v_registros[] = $o_contatoPF;
	}
	
	$o_contatoPFControl = new ContatoPFControl();
// 	$totalRegistro = $o_enderecoPFControl->qtdTotal();
	$totalRegistro = 1;
	
	// encoda para formato JSON
	echo json_encode(array(
			"success" => 0,
			"total" => $totalRegistro,
			"data" => $v_registros
	));
	
}

function cadastraContatoPF() {
	
	$jsonDados = $_POST['data'];
	$data = json_decode(stripslashes($jsonDados));
	
	$datahora = date("Y-m-d H:i:s");
	
	$o_pessoaFisica = new PessoaFisica();
	$o_pessoaFisica->setId(1);
	
	//------
	$o_contatoPF = new ContatoPF();
	$o_contatoPF->setTipocontato($data->tipoContato);
	$o_contatoPF->setOperadoracontato($data->operadoraContato);
	$o_contatoPF->setContato($data->contato);
	$o_contatoPF->setOPessoaFisica($o_pessoaFisica);
	$o_contatoPF->setDataCadastro($datahora);
	$o_contatoPF->setDataAtualizacao($datahora);
	
	$o_contatoPFControl = new ContatoPFControl($o_contatoPF);
	$o_contatoPFControl->cadastrar();
	
	$o_contatoPF->setId($o_contatoPFControl->getUltimoId());

	
	
	// encoda para formato JSON
	echo json_encode(array(
			"success" => 0,
			"data" => $o_contatoPF
	));
	
}

function atualizaContatoPF() {
	
	parse_str(file_get_contents("php://input"), $post_vars);
	$jsonDados = $post_vars['data'];
	$data = json_decode(stripslashes($jsonDados));
	
// 	$o_pessoaFisica = new PessoaFisica($data->id, $data->nome, $data->cpf, "1987-03-14 00:00:00", $data->enum_estadoCivil,
// 			$data->enum_sexo,$data->nomePai, $data->nomeMae, $data->enum_cor, $data->naturalidade, $data->nacionalidade, "1987-03-14 00:00:00","1987-03-14 00:00:00" );
	
// 	$o_pessoaFisicaControl = new PessoaFisicaControl($o_pessoaFisica);
// 	$o_pessoaFisicaControl->atualizar();
	
}

function deletaContatoPF() {
	
	parse_str(file_get_contents("php://input"), $post_vars);
	$jsonDados = $post_vars['data'];
	$data = json_decode(stripslashes($jsonDados));
		
	$id = $data->id;
	
	$o_contatoPF = new ContatoPF();
	$o_contatoPF->setId($id);
	
	$o_contatoPFControl = new ContatoPFControl($o_contatoPF);
	$o_contatoPFControl->deletar();
	
}

?>