<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/PessoaFisicaControl.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" .'model/bean/PessoaFisica.php';

$jsonDados = $_POST['data'];

$data = json_decode(stripslashes($jsonDados));

$o_pessoaFisica = new PessoaFisica($data->id, $data->nome, $data->cpf, "1987-03-14 00:00:00", $data->enum_estadoCivil,
		          $data->enum_sexo,$data->nomePai, $data->nomeMae, $data->enum_cor, $data->naturalidade, $data->nacionalidade, "1987-03-14 00:00:00","1987-03-14 00:00:00" );

$o_pessoaFisicaControl = new PessoaFisicaControl($o_pessoaFisica);
$o_pessoaFisicaControl->atualizar();


// encoda para formato JSON
// echo json_encode(array(
// 		"success" => 0,
// 		"total" => $totalRegistro,
// 		"data" => $v_registros
// ));

?>
