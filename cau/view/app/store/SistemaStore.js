/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.store.Sistema',{
	extend: 'Ext.data.Store',

	model: 'cau.model.Sistema',

	pageSize: 20,

	proxy: {
		type: 'ajax',

		api:{
			create: 'php/criaSistema.php',
			read: 'php/listaSistema.php',
			update: 'php/atualizaSistema.php',
			destroy: 'php/deletaSistema.php',
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