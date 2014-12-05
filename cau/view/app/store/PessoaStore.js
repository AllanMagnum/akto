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
		
		api:{
			create: 'controle/pessoa/cadastraPessoa.php',
			read: 'controle/pessoa/listaPessoa.php',
			update: 'controle/pessoa/atualizaPessoa.php',
			destroy: 'controle/pessoa/deletaPessoa.php',
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