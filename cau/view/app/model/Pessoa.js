/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.model.Pessoa',{
	extend: 'Ext.data.Model',

	fields: [
		{name: 'id',  				type: 'int'},
		{name: 'nome',  			type: 'string'},
		{name: 'cpf',  				type: 'string'},
		{name: 'dataNascimento',  	type: 'date' , dateFormat: 'c'},
		{name: 'enum_estadoCivil', 	type: 'string'},
		{name: 'enum_sexo', 		type: 'string'},
		{name: 'nomePai', 			type: 'string'},
		{name: 'nomeMae', 			type: 'string'},
		{name: 'enum_cor', 			type: 'string'},
		{name: 'naturalidade', 		type: 'string'},
		{name: 'nacionalidade', 	type: 'string'},
		{name: 'dataCadastro', 		type: 'date' , dateFormat: 'c'},
		{name: 'dataAtualizacao', 	type: 'date', dateFormat: 'c'}
	]	
	
});