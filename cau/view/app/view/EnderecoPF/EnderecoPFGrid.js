/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.view.enderecopf.EnderecoPFGrid',{
	extend: 'Ext.grid.Panel',
	alias: 'widget.enderecopfgrid',
	store: 'EnderecoPFStore',

	columns: [
		{ text: 'Id',  dataIndex: 'id', width: 50},
        { text: 'Tipo', dataIndex: 'tipoEndereco', width: 50},
        { text: 'Logradouro', dataIndex: 'logradouro', width: 250 },
        { text: 'Numero', dataIndex: 'numero', width: 50},
        { text: 'Complemento', dataIndex: 'complemento', width: 75},
        { text: 'Bairro', dataIndex: 'bairro', width: 200 },
        { text: 'CEP', dataIndex: 'cep' }
	],

	dockedItems: [
		{
			xtype: 'toolbar',
			dock: 'top',
			items: [
				{
					xtype: 'button',
					text: 'Novo',
					itemId: 'addenderecopf',
					iconCls: 'icon-add'
				},
				{
					xtype: 'button',
					text: 'Excluir',
					itemId: 'deleteenderecopf',
					iconCls: 'icon-delete'
				}
			]
		}
	]
	

});