/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.model.EnderecoPF',{
	extend: 'Ext.data.Model',

	fields: [
		{name: 'id',  				type: 'int'},
		{name: 'tipoEndereco',		type: 'string'},
		{name: 'logradouro',		type: 'string'},
		{name: 'numero',		  	type: 'string'},
		{name: 'complemento', 		type: 'string'},
		{name: 'bairro', 			type: 'string'},
		{name: 'cep', 				type: 'string'},
//		{name: 'pessoaFisica',		type: 'int'},
		{name: 'cidade', 			type: 'int'}
	]	
	
});