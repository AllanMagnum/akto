/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.model.Perfil',{
	extend: 'Ext.data.Model',

	fields: [
		{name: 'id',  				type: 'int'},
		{name: 'nome',  			type: 'string'},
		{name: 'datacadastro', 		type: 'date' , dateFormat: 'c'},
		{name: 'dataatualizacao', 	type: 'date', dateFormat: 'c'}
	]	
	
});