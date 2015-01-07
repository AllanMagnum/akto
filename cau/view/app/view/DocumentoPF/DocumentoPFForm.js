/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */


Ext.define('cau.view.documentopf.DocumentoPFForm',{
	
	extend: 'Ext.window.Window',	
	alias: 'widget.documentopfform',

	height: 250,
	width: 350,
	layout: 'fit',
	iconCls: 'icon-user',
	title: 'Editar/Criar Endereço PF',
	autoShow: true,

	items: [
		{
			xtype: 'form',
			bodyPadding: 10,
			defaults: {
				anchor: '100%'
			},
			items: [
				{
					xtype: 'hiddenfield',
			        name: 'id'
				},
				{
					xtype: 'textfield',
					fieldLabel:'Tipo',
					name: 'tipoDocumento'
				},
				{
					xtype: 'textfield',
					 fieldLabel:'Numero',
					 name: 'numero'	
				},
				{
					xtype:'datefield',
					fieldLabel:'Data Emissão',
					name: 'dataEmissao'	
				},
				{
					xtype: 'textfield',
					fieldLabel:'Orgão Emissor',
					name: 'orgaoEmissor'
				},
				{
					xtype: 'textfield',
					fieldLabel:'Via',
					name: 'via'
				}
			]
		}
	],
	
	dockedItems: [
		{
			xtype: 'toolbar',
			dock: 'bottom',
			layout: {
				type: 'hbox',
				pack: 'end'
			},
			items: [
				{
					xtype: 'button',
					text: 'Cancelar',
					itemId: 'canceldocumentopf',
					iconCls: 'icon-reset'
				},
				{
					xtype: 'button',
					text: 'Salvar',
					itemId: 'savedocumentopf',
					iconCls: 'icon-save'
				}
			]
		}
	]

});