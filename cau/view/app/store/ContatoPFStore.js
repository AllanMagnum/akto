/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.store.ContatoPFStore',{
	extend: 'Ext.data.Store',
	
	model: 'cau.model.ContatoPF',

	proxy: {
		type: 'rest',
		
		url: 'rest/contatopf.php',
		
		reader: {
			type: 'json',
			root: 'data'
		},

		writer: {
			type: 'json',
			root: 'data',
			encode: true,
			writeAllFields: false
		}
	}
});