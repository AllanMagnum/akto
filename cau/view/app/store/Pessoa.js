/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.store.Pessoa',{
	extend: 'Ext.data.Store',

	model: 'cau.model.Pessoa',

	pageSize: 20,

	proxy: {
		type: 'ajax',

		api:{
			create: 'php/criaPessoa.php',
			read: 'php/listaPessoa.php',
			update: 'php/atualizaPessoa.php',
			destroy: 'php/deletaPessoa.php',
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