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
					xtype:'combo',
					name: 'cbxTipoContato',
			        defaults:{anchor:'100%'},
					fieldLabel:'TipoContato',
					store: 'TipoContatoStore',
					queryMode: 'rest',
					displayField: 'nome',
					valueField: 'CELULAR'
				},
				{
					xtype:'combo',
					name: 'cbxOperadoraContato',
			        defaults:{anchor:'100%'},
					fieldLabel:'OperadoraContato',
					store: 'OperadoraContatoStore',
					queryMode: 'rest',
					displayField: 'nome',
					valueField: 'VIVO'
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