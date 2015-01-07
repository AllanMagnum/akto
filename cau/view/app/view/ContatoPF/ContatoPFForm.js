/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.view.contatopf.ContatoPFForm',{
	
	extend: 'Ext.window.Window',	
	alias: 'widget.contatopfform',

	height: 200,
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
			        name: 'tipoContato',
			        fieldLabel: 'Tipo'
				},
				{
					xtype: 'textfield',
			        name: 'operadora',
			        fieldLabel: 'Operadora'
				},
				{
					xtype: 'textfield',
			        name: 'contato',
			        fieldLabel: 'Contato'
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
					itemId: 'cancelcontatopf',
					iconCls: 'icon-reset'
				},
				{
					xtype: 'button',
					text: 'Salvar',
					itemId: 'savecontatopf',
					iconCls: 'icon-save'
				}
			]
		}
	]
	

});