<?php
	include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/Pessoa.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'control/PessoaControl.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/dao/PessoaDAO.php';
	
	
	
	//cadastrar pessoa allan
	
	$datahora = date("Y-m-d H:i:s");
	$o_pessoa = new Pessoa();
	$o_pessoa->setNome('allan');
	$o_pessoa->setTelefoneMovel('9293442610');
	$o_pessoa->setTelefoneFixo('9236411948');
	$o_pessoa->setEmail('allan.magnum@gmail.com');
	$o_pessoa->setEmailAdicional('allan_magnum@outlook.com');
	$o_pessoa->setLogradouro('143');
	$o_pessoa->setNumero('64');
	$o_pessoa->setComplemento('nucleo 9');
	$o_pessoa->setBairro('cidade nova 2');
	$o_pessoa->setCep('69097720');
	$o_pessoa->setDataCadastro($datahora);
	$o_pessoa->setDataAtualizacao("0000-00-00 00:00:00");
	
	for ($i = 0; $i < 1000; $i++) {
		$pessoaControl = new PessoaControl($o_pessoa);
		$pessoaControl->cadastrar();
	}
	
	echo "<font color=\'#FF0000\'> cadastrar pessoa allan </font>";
	echo '<br>';
	echo $o_pessoa;
	echo '<br>';
	echo '<br>';
	
	//buscar por nome allan
	$o_pessoa = new Pessoa();
	$o_pessoa->setId(1);
	
	$pessoaControl = new PessoaControl($o_pessoa);
	$v_o_pessoa = $pessoaControl->buscarPorNome();
	
	$i=0;
	echo "<font color=\'#FF0000\'> Buscar por nome allan </font>";
	echo '<br>';
	foreach ($v_o_pessoa  as $o_pessoa_p) {
		echo $i . "- ". $o_pessoa_p;
		echo '<br>';
		echo '<br>';
		$i++;
	}
	
	//buscar por id 1
	echo "<font color=\'#FF0000\'> Buscar por id 1 </font>";
	echo '<br>';
	$o_pessoa = new Pessoa();
	$o_pessoa->setId(1);
	$pessoaControl = new PessoaControl($o_pessoa);
	echo $pessoaControl->buscarPorId();
	echo "<br>";
	echo '<br>';
	
	//atualizar endereco pessoa com id = 1
	echo "<font color=\'#FF0000\'> Atualizar endereco da pessoa com id = 1 </font>";
	echo '<br>';
	$o_pessoa = new Pessoa();
	$o_pessoa->setId(1);
	$o_pessoa->setNome('allan');
	$o_pessoa->setTelefoneMovel('9293442610');
	$o_pessoa->setTelefoneFixo('9236411948');
	$o_pessoa->setEmail('allan.magnum@gmail.com');
	$o_pessoa->setEmailAdicional('allan_magnum@outlook.com');
	$o_pessoa->setLogradouro('av. camapua');
	$o_pessoa->setNumero('462');
	$o_pessoa->setComplemento('nucleo 9');
	$o_pessoa->setBairro('cidade nova 2');
	$o_pessoa->setCep('69097720');
	$o_pessoa->setDataAtualizacao($datahora);
	
	$pessoaControl = new PessoaControl($o_pessoa);
	$pessoaControl->atualizar();
	echo $o_pessoa;
	echo "<br>";
	echo '<br>';
	
	//deletar pessoa com id = 1
	echo "<font color=\'#FF0000\'> Deletar pessoa com id = 1 </font>";
	echo '<br>';
	$o_pessoa = new Pessoa();
	$o_pessoa->setId(1);
	$pessoaControl = new PessoaControl($o_pessoa);
	echo $pessoaControl->deletar();
	
?>