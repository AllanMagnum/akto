/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.model.OperadoraContatoModel',{
	extend: 'Ext.data.Model',

	fields: [
		{name: 'id',  				type: 'int'},
		{name: 'descricao',  		type: 'string'}
	]	
	
});