<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/PessoaControl.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" .'model/bean/Pessoa.php';

$start = $_REQUEST['start'];
$limit = $_REQUEST['limit'];

$o_pessoaControl = new PessoaControl ();
//$v_pessoas = $o_pessoaControl->listarTodosJson($start,$limit);


//consulta total de linhas na tabela
$total = $o_pessoaControl->totalRegistros();
 
//encoda para formato JSON
echo json_encode(array(
		"success" => 0,
		"total" => $total,
		"data" => $v_pessoas
));

?>