/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.model.Acesso',{
	extend: 'Ext.data.Model',

	fields: [
		{name: 'idusuario',  		type: 'int'},
		{name: 'idperfil',  		type: 'int'},
		{name: 'idsistema',  		type: 'int'},
		{name: 'idmodulo',  		type: 'int'},
		{name: 'visualizar',  		type: 'string'},
		{name: 'cadastrar',  		type: 'string'},
		{name: 'consultar',  		type: 'string'},
		{name: 'atualizar',  		type: 'string'},
		{name: 'deletar',  			type: 'string'},
		{name: 'datacadastro', 		type: 'date' , dateFormat: 'c'},
		{name: 'dataatualizacao', 	type: 'date', dateFormat: 'c'}
	]	
	
});