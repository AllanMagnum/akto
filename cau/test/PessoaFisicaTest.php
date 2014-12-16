<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/PessoaFisica.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/PessoaFisicaControl.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/EnderecoPF.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/DocumentoPF.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/ContatoPF.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/TipoContato.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/TipoContatoControl.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/OperadoraContato.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/OperadoraContatoControl.php';
	
	
	//cadastrar pessoa allan
	
	$datahora = date("Y-m-d H:i:s");
	$o_pessoaFisica = new PessoaFisica();
	$o_pessoaFisica->setNome('alex');
	$o_pessoaFisica->setCpf('9293442610');
	$o_pessoaFisica->setDataNascimento("1987-03-14 00:00:00");
	$o_pessoaFisica->setEnumEstadoCivil('solteiro');
	$o_pessoaFisica->setEnumSexo('MASCULINO');
	$o_pessoaFisica->setNomePai('Antonio Jorge');
	$o_pessoaFisica->setNomeMae('Suely');
	$o_pessoaFisica->setEnumCor('PARDA');
	$o_pessoaFisica->setNaturalidade('amazonense');
	$o_pessoaFisica->setNacionalidade('brasileiro');
	
	$o_tipoEndereco = new TipoEndereco();
	$o_tipoEndereco->setDescricao("ENTREGA");
	$o_tipoEndereco->setDataCadastro($datahora);
	$o_tipoEndereco->setDataAtualizacao("0000-00-00 00:00:00");
	
	$o_pais = new Pais();
	$o_pais->setNome("Brasil");
	$o_pais->setSigla("BRA");
	
	$o_estado = new Estado();
	$o_estado->setNome("Amazonas");
	$o_estado->setOPais($o_pais);
	
	$o_cidade = new Cidade();
	$o_cidade->setId(1);
	$o_cidade->setNome("Manaus");
	$o_cidade->setOEstado($o_estado);
	
	$o_enderecoPF = new EnderecoPF();
	$o_enderecoPF->setOTipoEndereco($o_tipoEndereco);
	$o_enderecoPF->setLogradouro("Avenida camapua");
	$o_enderecoPF->setNumero("462");
	$o_enderecoPF->setComplemento("nucleo 9");
	$o_enderecoPF->setBairro("Cidade Nova 2");
	$o_enderecoPF->setOCidade($o_cidade);
	$o_enderecoPF->setDataCadastro($datahora);
	$o_enderecoPF->setDataAtualizacao("0000-00-00 00:00:00");
 
	$o_tipoContato = new TipoContato();
	$o_tipoContato->setId(1);
	$o_tipoContatoControl = new TipoContatoControl($o_tipoContato);
	$o_tipoContato = $o_tipoContatoControl->buscarPorId();
	
	$o_operadoraContato = new OperadoraContato();
	$o_operadoraContato->setId(1);
	$o_operadoraContatoControl = new OperadoraContatoControl($o_operadoraContato);
	$o_operadoraContato = $o_operadoraContatoControl->buscarPorId();
	
	$o_tipoContato2 = new TipoContato();
	$o_tipoContato2->setId(2);
	$o_tipoContatoControl = new TipoContatoControl($o_tipoContato2);
	$o_tipoContato2 = $o_tipoContatoControl->buscarPorId();
	
	$o_operadoraContato2 = new OperadoraContato();
	$o_operadoraContato2->setId(2);
	$o_operadoraContatoControl = new OperadoraContatoControl($o_operadoraContato2);
	$o_operadoraContato2 = $o_operadoraContatoControl->buscarPorId();
	
	$o_contatoPF = new ContatoPF();
	$o_contatoPF->setOTipocontato($o_tipoContato);
	$o_contatoPF->setOOperadoracontato($o_operadoraContato);
	$o_contatoPF->setContato("allan.magnum@gmail.com");
	$o_contatoPF->setDataCadastro($datahora);
	$o_contatoPF->setDataAtualizacao("0000-00-00 00:00:00");
	
	$o_contatoPF2 = new ContatoPF();
	$o_contatoPF2->setOTipocontato($o_tipoContato2);
	$o_contatoPF2->setOOperadoracontato($o_operadoraContato2);
	$o_contatoPF2->setContato("092993442610");
	$o_contatoPF2->setDataCadastro($datahora);
	$o_contatoPF2->setDataAtualizacao("0000-00-00 00:00:00");
	
	$o_pessoaFisica->adicionarContato($o_contatoPF);
	$o_pessoaFisica->adicionarContato($o_contatoPF2);
	$o_pessoaFisica->adicionarEndereco($o_enderecoPF);
	$o_pessoaFisica->setDataCadastro($datahora);
	$o_pessoaFisica->setDataAtualizacao("0000-00-00 00:00:00");
	
	for ($i = 0; $i < 1; $i++) {
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
	$o_pessoaFisica->setEnumEstadoCivil('solteiro');
	$o_pessoaFisica->setEnumSexo('MASCULINO');
	$o_pessoaFisica->setNomePai('Antonio Jorge');
	$o_pessoaFisica->setNomeMae('Suely');
	$o_pessoaFisica->setEnumCor('AMARELA');
	$o_pessoaFisica->setNaturalidade('amazonense');
	$o_pessoaFisica->setNacionalidade('brasileiro');
	$o_pessoaFisica->setDataCadastro($datahora);
	$o_pessoaFisica->setDataAtualizacao("0000-00-00 00:00:00");
	
	$pessoaFisicaControl = new PessoaFisicaControl($o_pessoaFisica);
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