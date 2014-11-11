/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.store.Acesso',{
	extend: 'Ext.data.Store',

	model: 'cau.model.Acesso',

	pageSize: 20,

	proxy: {
		type: 'ajax',

		api:{
			create: 'php/criaAcesso.php',
			read: 'php/listaAcesso.php',
			update: 'php/atualizaAcesso.php',
			destroy: 'php/deletaAcesso.php',
		},

		reader: {
			type: 'json',
			root: 'data'
		},

		writer: {
			type: 'json',
			root: 'data',
			encode: true
		}
	}
});/**
 * 
 */