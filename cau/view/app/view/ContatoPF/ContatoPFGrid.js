/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.view.contatopf.ContatoPFGrid',{
	extend: 'Ext.grid.Panel',
	alias: 'widget.contatopfgrid',
	store: 'ContatoPFStore',

	columns: [
		{ text: 'Id',  dataIndex: 'id', width: 50},
        { text: 'Tipo', dataIndex: 'tipoContato', width: 50},
        { text: 'Operadora', dataIndex: 'operadora', width: 50},
        { text: 'Contato', dataIndex: 'contato', width: 200 }
	],

	dockedItems: [
		{
			xtype: 'toolbar',
			dock: 'top',
			items: [
				{
					xtype: 'button',
					text: 'Novo',
					itemId: 'addcontatopf',
					iconCls: 'icon-add'
				},
				{
					xtype: 'button',
					text: 'Excluir',
					itemId: 'deletecontatopf',
					iconCls: 'icon-delete'
				}
			]
		}
	]
	

});