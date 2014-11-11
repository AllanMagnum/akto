/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.view.PessoaGrid',{
	extend: 'Ext.grid.Panel',
	alias: 'widget.pessoagrid',

	store: 'cau.store.Pessoa',

	title: 'Pessoa',

	iconCls: 'icon-grid',

	columns: [
		{
			text: 'ID',
			width: 35,
			dataIndex: 'id'
		}
	],

	dockedItems: [
		{
			xtype: 'toolbar',
			dock: 'top',
			items: [
				{
					xtype: 'button',
					text: 'Novo',
					itemId: 'add',
					iconCls: 'icon-add'
				},
				{
					xtype: 'button',
					text: 'Excluir',
					itemId: 'delete',
					iconCls: 'icon-delete'
				}
			]
		},
		{
			xtype: 'pagingtoolbar',
	        store: 'cau.store.Pessoa',
	        dock: 'top',
	        displayInfo: true,
	        emptyMsg: 'Nenhuma Pessoa encontrada'
		}
	]

});