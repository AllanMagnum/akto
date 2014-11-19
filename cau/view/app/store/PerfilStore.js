/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.store.Perfil',{
	extend: 'Ext.data.Store',

	model: 'cau.model.Perfil',

	pageSize: 20,

	proxy: {
		type: 'ajax',

		api:{
			create: 'php/criaPerfil.php',
			read: 'php/listaPerfil.php',
			update: 'php/atualizaPerfil.php',
			destroy: 'php/deletaPerfil.php',
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