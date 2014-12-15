<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/PessoaFisicaControl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" .'model/bean/PessoaFisica.php';

switch ($_SERVER['REQUEST_METHOD']) {
	
		case 'GET':
			listaPessoa();
			break;
	
		case 'POST':
			cadastraPessoa();
			break;
	
		case 'PUT':
			atualizaPessoa();
			break;
				
		case 'DELETE':
			deletaPessoa();
			break;
}
	
function listaPessoa() {
	
	$start = $_REQUEST['start'];
	$limit = $_REQUEST['limit'];
	

	$o_pessoaFisicaControl = new PessoaFisicaControl();
	$v_o_pessoaFisica = $o_pessoaFisicaControl->listarPaginado($start, $limit);
	
	foreach ($v_o_pessoaFisica as $o_pessoaFisica) {
		$v_registros[] = $o_pessoaFisica;
	}
	
	$o_pessoaFisicaControl = new PessoaFisicaControl();
	$totalRegistro = $o_pessoaFisicaControl->qtdTotal();
	
	
	// encoda para formato JSON
	echo json_encode(array(
			"success" => 0,
			"total" => $totalRegistro,
			"data" => $v_registros
	));
	
}

function cadastraPessoa() {
	
	$jsonDados = $_POST['data'];
	$data = json_decode(stripslashes($jsonDados));
	
	$datahora = date("Y-m-d H:i:s");
	$o_pessoaFisica = new PessoaFisica();
	$o_pessoaFisica->setNome($data->nome);
	$o_pessoaFisica->setCpf($data->cpf);
	$o_pessoaFisica->setDataNascimento("1987-03-14 00:00:00");
	$o_pessoaFisica->setEnumEstadoCivil($data->enum_estadoCivil);
	$o_pessoaFisica->setEnumSexo($data->enum_sexo);
	$o_pessoaFisica->setNomePai($data->nomePai);
	$o_pessoaFisica->setNomeMae($data->nomeMae);
	$o_pessoaFisica->setEnumCor('PARDA');
	$o_pessoaFisica->setNaturalidade('amazonense');
	$o_pessoaFisica->setNacionalidade('brasileiro');
	$o_pessoaFisica->setDataCadastro($datahora);
	$o_pessoaFisica->setDataAtualizacao($datahora);
	
	$o_pessoaFisicaControl = new PessoaFisicaControl($o_pessoaFisica);
	$o_pessoaFisicaControl->cadastrar();
	
	$o_pessoaFisica->setId($o_pessoaFisicaControl->getUltimoId());
	
	
	// encoda para formato JSON
	echo json_encode(array(
			"success" => 0,
			"data" => $o_pessoaFisica
	));
	
}

function atualizaPessoa() {
	
	parse_str(file_get_contents("php://input"), $post_vars);
	$jsonDados = $post_vars['data'];
	$data = json_decode(stripslashes($jsonDados));
	
	$o_pessoaFisica = new PessoaFisica($data->id, $data->nome, $data->cpf, "1987-03-14 00:00:00", $data->enum_estadoCivil,
			$data->enum_sexo,$data->nomePai, $data->nomeMae, $data->enum_cor, $data->naturalidade, $data->nacionalidade, "1987-03-14 00:00:00","1987-03-14 00:00:00" );
	
	$o_pessoaFisicaControl = new PessoaFisicaControl($o_pessoaFisica);
	$o_pessoaFisicaControl->atualizar();
	
}

function deletaPessoa() {
	
	parse_str(file_get_contents("php://input"), $post_vars);
	$jsonDados = $post_vars['data'];
	$data = json_decode(stripslashes($jsonDados));
		
	$id = $data->id;
	
	$o_pessoaFisica = new PessoaFisica();
	$o_pessoaFisica->setId($id);
	
	$o_pessoaFisicaControl = new PessoaFisicaControl($o_pessoaFisica);
	$o_pessoaFisicaControl->deletar();
	
}

?>