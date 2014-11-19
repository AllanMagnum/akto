/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.store.Opcoes',{
	extend: 'Ext.data.Store',

	model: 'cau.model.Opcoes',

	pageSize: 20,

	proxy: {
		type: 'ajax',

		api:{
			create: 'php/criaOpcoes.php',
			read: 'php/listaOpcoes.php',
			update: 'php/atualizaOpcoes.php',
			destroy: 'php/deletaOpcoes.php',
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