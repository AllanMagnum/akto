/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.store.TipoContatoStore',{
	extend: 'Ext.data.Store',
	
	model: 'cau.model.TipoContatoModel',

	proxy: {
		type: 'rest',
		
		url: 'rest/tipoContatoRest.php',
		
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