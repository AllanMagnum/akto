/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.store.EnderecoPFStore',{
	extend: 'Ext.data.Store',
	
	model: 'cau.model.EnderecoPF',

	proxy: {
		type: 'rest',
		
		url: 'rest/enderecoPF.php',
		
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