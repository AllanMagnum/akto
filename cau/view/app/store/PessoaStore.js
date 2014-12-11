/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.store.PessoaStore',{
	extend: 'Ext.data.Store',
	
	model: 'cau.model.Pessoa',

	proxy: {
		//type: 'ajax',
		type: 'rest',
		
//		api:{
//			create: 'rest/pessoa.php',
//			read: 'rest/pessoa.php',
//			update: 'rest/pessoa.php',
//			destroy: 'rest/pessoa.php',
//		},
		
		url: 'rest/pessoa.php',
		
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