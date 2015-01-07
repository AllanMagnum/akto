/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.model.ContatoPF',{
	extend: 'Ext.data.Model',

	fields: [
		{name: 'id',  				type: 'int'},
		{name: 'tipoContato',  		type: 'string'},
		{name: 'operadora',  		type: 'string'},
		{name: 'contato',  			type: 'string'}
	]	
	
});