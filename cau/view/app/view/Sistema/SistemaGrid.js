/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.view.SistemaGrid',{
	extend: 'Ext.grid.Panel',
	alias: 'widget.sistemagrid',

	store: 'cau.store.Sistema',

	title: 'Sistema',

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
	        store: 'cau.store.Sistema',
	        dock: 'top',
	        displayInfo: true,
	        emptyMsg: 'Nenhum Sistema encontrado'
		}
	]

});