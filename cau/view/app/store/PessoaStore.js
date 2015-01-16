/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.store.PessoaStore',{
	extend: 'Ext.data.Store',
	
	model: 'cau.model.Pessoa',

	proxy: {
		type: 'rest',
		
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
});