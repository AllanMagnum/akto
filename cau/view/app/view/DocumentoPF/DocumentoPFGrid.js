/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.view.documentopf.DocumentoPFGrid',{
	extend: 'Ext.grid.Panel',
	alias: 'widget.documentopfgrid',
	store: 'DocumentoPFStore',

	columns: [
		{ text: 'Id',  dataIndex: 'id', width: 50},
        { text: 'Tipo', dataIndex: 'enum_tipo', width: 50},
        { text: 'Numero', dataIndex: 'numero', width: 50},
        { text: 'Data Emissão', dataIndex: 'dataEmissao', renderer : Ext.util.Format.dateRenderer('d/m/Y')},
        { text: 'Orgao Emissor', dataIndex: 'orgaoEmissor', width: 200 },
        { text: 'Via', dataIndex: 'via' }
	],

	dockedItems: [
		{
			xtype: 'toolbar',
			dock: 'top',
			items: [
				{
					xtype: 'button',
					text: 'Novo',
					itemId: 'adddocumentopf',
					iconCls: 'icon-add'
				},
				{
					xtype: 'button',
					text: 'Excluir',
					itemId: 'deletedocumentopf',
					iconCls: 'icon-delete'
				}
			]
		}
	]
	

});