/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.store.CidadeStore',{
	extend: 'Ext.data.Store',
	
	model: 'cau.model.CidadeModel',

	proxy: {
		type: 'rest',
		
		url: 'rest/cidadeRest.php',
		
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