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
		{name: 'telefoneMovel',  	type: 'string'},
		{name: 'telefoneFixo',  	type: 'string'},
		{name: 'telefoneAdicional', type: 'string'},
		{name: 'email', 			type: 'string'},
		{name: 'emailAdicional', 	type: 'string'},
		{name: 'logradouro', 		type: 'string'},
		{name: 'numero', 			type: 'string'},
		{name: 'complemento', 		type: 'string'},
		{name: 'bairro', 			type: 'string'},
		{name: 'datacadastro', 		type: 'date' , dateFormat: 'c'},
		{name: 'dataatualizacao', 	type: 'date', dateFormat: 'c'}
	]	
	
});