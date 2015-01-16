<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/EnderecoPFControl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" .'model/bean/EnderecoPF.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" .'control/CidadeControl.php';

switch ($_SERVER['REQUEST_METHOD']) {
	
		case 'GET':
			listaEnderecoPF();
			break;
	
		case 'POST':
			cadastraEnderecoPF();
			break;
	
		case 'PUT':
			atualizaEnderecoPF();
			break;
				
		case 'DELETE':
			deletaEnderecoPF();
			break;
}
	
function listaEnderecoPF() {
	
	$o_pessoaFisica = new PessoaFisica();
	$o_pessoaFisica->setId(1);
	$o_enderecoPF = new EnderecoPF();
	$o_enderecoPF->setOPessoaFisica($o_pessoaFisica);
	$o_enderecoPFControl = new EnderecoPFControl($o_enderecoPF);
	$v_o_enderecoPF = $o_enderecoPFControl->listarPorPessoa();
	foreach ($v_o_enderecoPF as $o_enderecoPF) {
		$v_registros[] = $o_enderecoPF;
	}
	
	$o_enderecoPFControl = new EnderecoPFControl();
// 	$totalRegistro = $o_enderecoPFControl->qtdTotal();
	$totalRegistro = 1;
	
	// encoda para formato JSON
	echo json_encode(array(
			"success" => 0,
			"total" => $totalRegistro,
			"data" => $v_registros
	));
	
}

function cadastraEnderecoPF() {
	
	$jsonDados = $_POST['data'];
	$data = json_decode(stripslashes($jsonDados));
	
	$datahora = date("Y-m-d H:i:s");
	
	$o_pessoaFisica = new PessoaFisica();
	$o_pessoaFisica->setId(1);
	
	$o_cidade = new Cidade();
	$o_cidade->setId($data->cidade);
	$o_cidadeControl = new CidadeControl($o_cidade);
	$o_cidade = $o_cidadeControl->buscarPorId();
	
	//------
	$o_enderecoPF = new EnderecoPF();
	$o_enderecoPF->setTipoEndereco($data->tipoEndereco);
	$o_enderecoPF->setLogradouro($data->logradouro);
	$o_enderecoPF->setNumero($data->numero);
	$o_enderecoPF->setComplemento($data->complemento);
	$o_enderecoPF->setBairro($data->bairro);
	$o_enderecoPF->setCep($data->cep);
	$o_enderecoPF->setOPessoaFisica($o_pessoaFisica);
	$o_enderecoPF->setOCidade($o_cidade);
	$o_enderecoPF->setDataCadastro($datahora);
	$o_enderecoPF->setDataAtualizacao($datahora);
	
	$o_enderecoPFControl = new EnderecoPFControl($o_enderecoPF);
	$o_enderecoPFControl->cadastrar();
	
 	$o_enderecoPF->setId($o_enderecoPFControl->getUltimoId());

	// encoda para formato JSON
	echo json_encode(array(
			"success" => 0,
			"data" => $o_enderecoPF
	));
	
}

function atualizaEnderecoPF() {
	
	parse_str(file_get_contents("php://input"), $post_vars);
	$jsonDados = $post_vars['data'];
	$data = json_decode(stripslashes($jsonDados));
	
// 	$o_pessoaFisica = new PessoaFisica($data->id, $data->nome, $data->cpf, "1987-03-14 00:00:00", $data->enum_estadoCivil,
// 			$data->enum_sexo,$data->nomePai, $data->nomeMae, $data->enum_cor, $data->naturalidade, $data->nacionalidade, "1987-03-14 00:00:00","1987-03-14 00:00:00" );
	
// 	$o_pessoaFisicaControl = new PessoaFisicaControl($o_pessoaFisica);
// 	$o_pessoaFisicaControl->atualizar();
	
}

function deletaEnderecoPF() {
	
	parse_str(file_get_contents("php://input"), $post_vars);
	$jsonDados = $post_vars['data'];
	$data = json_decode(stripslashes($jsonDados));
		
	$id = $data->id;
	
	$o_enderecoPF = new EnderecoPF();
	$o_enderecoPF->setId($id);
	
	$o_enderecoPFControl = new EnderecoPFControl($o_enderecoPF);
	$o_enderecoPFControl->deletar();
	
}

?>