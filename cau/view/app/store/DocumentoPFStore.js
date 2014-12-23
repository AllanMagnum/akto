/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.store.DocumentoPFStore',{
	extend: 'Ext.data.Store',
	
	model: 'cau.model.DocumentoPF',

	proxy: {
		type: 'rest',
		
		url: 'rest/documentopf.php',
		
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