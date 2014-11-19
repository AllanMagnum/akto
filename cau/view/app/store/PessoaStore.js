/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.store.PessoaStore',{
	extend: 'Ext.data.Store',
	
	model: 'cau.model.Pessoa',

	proxy: {
		type: 'ajax',
		
		url: 'controle/pessoa/listaPessoa.php',

		reader: {
			type: 'json',
			root: 'pessoa'
		},
	},
	autoLoad: true
});/**
 * 
 */