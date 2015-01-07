/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.model.DocumentoPF',{
	extend: 'Ext.data.Model',

	fields: [
		{name: 'id',  				type: 'int'},
		{name: 'tipoDocumento',		type: 'string'},
		{name: 'numero',  			type: 'string'},
		{name: 'dataEmissao',  		type: 'date' , dateFormat: 'c'},
		{name: 'orgaoEmissor',		type: 'string'},
		{name: 'via',  				type: 'int'}
	]	
	
});