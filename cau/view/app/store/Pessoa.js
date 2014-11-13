/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.store.Pessoa',{
	extend: 'Ext.data.Store',

	model: 'cau.model.Pessoa',

	pageSize: 20,

	proxy: {
		type: 'ajax',

		api:{
			create: 'view/controle/pessoa/criaPessoa.php',
			read: 'controle/pessoa/ListaPessoa.php',
			update: 'view/controle/pessoa/atualizaPessoa.php',
			destroy: 'view/controle/pessoa/deletaPessoa.php',
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