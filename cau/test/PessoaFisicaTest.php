<?php
	include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/PessoaFisica.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/PessoaFisicaControl.php';
	
	
	
	//cadastrar pessoa allan
	
	$datahora = date("Y-m-d H:i:s");
	$o_pessoaFisica = new PessoaFisica();
	$o_pessoaFisica->setNome('allan');
	$o_pessoaFisica->setCpf('9293442610');
	$o_pessoaFisica->setDataNascimento("1987-03-14 00:00:00");
	$o_pessoaFisica->setEstadoCivil('solteiro');
	$o_pessoaFisica->setSexo('MASCULINO');
	$o_pessoaFisica->setNomePai('Antonio Jorge');
	$o_pessoaFisica->setNomeMae('Suely');
	$o_pessoaFisica->setCor('negao');
	$o_pessoaFisica->setNaturalidade('amazonense');
	$o_pessoaFisica->setNacionalidade('brasileiro');
	$o_pessoaFisica->setDataCadastro($datahora);
	$o_pessoaFisica->setDataAtualizacao("0000-00-00 00:00:00");
	
	for ($i = 0; $i < 1000; $i++) {
		$pessoaFisicaControl = new PessoaFisicaControl($o_pessoaFisica);
		$pessoaFisicaControl->cadastrar();
	}
	
	echo "<font color=\'#FF0000\'> cadastrar pessoa allan </font>";
	echo '<br>';
	echo $o_pessoaFisica;
	echo '<br>';
	echo '<br>';
	
	//buscar por nome allan
	$o_pessoaFisica = new PessoaFisica();
	$o_pessoaFisica->setId(1);
	
	$pessoaFisicaControl = new PessoaFisicaControl($o_pessoaFisica);
	$v_o_pessoaFisica = $pessoaFisicaControl->buscarPorNome();
	
	$i=0;
	echo "<font color=\'#FF0000\'> Buscar por nome allan </font>";
	echo '<br>';
	foreach ($v_o_pessoaFisica  as $o_pessoaFisica_p) {
		echo $i . "- ". $o_pessoaFisica_p;
		echo '<br>';
		echo '<br>';
		$i++;
	}
	
	//buscar por id 1
	echo "<font color=\'#FF0000\'> Buscar por id 1 </font>";
	echo '<br>';
	$o_pessoaFisica = new PessoaFisica();
	$o_pessoaFisica->setId(1);
	$pessoaFisicaControl = new PessoaFisicaControl($o_pessoaFisica);
	echo $pessoaFisicaControl->buscarPorId();
	echo "<br>";
	echo '<br>';
	
	//atualizar endereco pessoa com id = 1
	echo "<font color=\'#FF0000\'> Atualizar endereco da pessoa com id = 1 </font>";
	echo '<br>';
	$o_pessoaFisica = new PessoaFisica();
	$o_pessoaFisica->setNome('allan');
	$o_pessoaFisica->setCpf('9293442610');
	$o_pessoaFisica->setDataNascimento("1987-03-14 00:00:00");
	$o_pessoaFisica->setEstadoCivil('solteiro');
	$o_pessoaFisica->setSexo('MASCULINO');
	$o_pessoaFisica->setNomePai('Antonio Jorge');
	$o_pessoaFisica->setNomeMae('Suely');
	$o_pessoaFisica->setCor('negao');
	$o_pessoaFisica->setNaturalidade('amazonense');
	$o_pessoaFisica->setNacionalidade('brasileiro');
	$o_pessoaFisica->setDataCadastro($datahora);
	$o_pessoaFisica->setDataAtualizacao("0000-00-00 00:00:00");
	
	$pessoaFisicaControl = new PessoaFisicaControl($o_pessoa);
	$pessoaFisicaControl->atualizar();
	echo $o_pessoaFisica;
	echo "<br>";
	echo '<br>';
	
	//deletar pessoa com id = 1
	echo "<font color=\'#FF0000\'> Deletar pessoa com id = 1 </font>";
	echo '<br>';
	$o_pessoaFisica = new PessoaFisica();
	$o_pessoaFisica->setId(1);
	$pessoaFisicaControl = new PessoaFisicaControl($o_pessoaFisica);
	echo $pessoaFisicaControl->deletar();
	
?>