/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.view.AcessoGrid',{
	extend: 'Ext.grid.Panel',
	alias: 'widget.acessogrid',

	store: 'cau.store.Acesso',

	title: 'Acesso',

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
	        store: 'cau.store.Acesso',
	        dock: 'top',
	        displayInfo: true,
	        emptyMsg: 'Nenhum Acesso encontrado'
		}
	]

});
