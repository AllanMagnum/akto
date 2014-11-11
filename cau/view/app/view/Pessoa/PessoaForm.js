/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.view.PessoaForm',{
	extend: 'Ext.window.Window',
	alias: 'widget.pessoaform',

	height: 200,
	width: 350,
	layout: 'fit',
	iconCls: 'icon-user',
	title: 'Editar/Criar Pessoa',
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
					itemId: 'cancel',
					iconCls: 'icon-reset'
				},
				{
					xtype: 'button',
					text: 'Salvar',
					itemId: 'save',
					iconCls: 'icon-save'
				}
			]
		}
	]
});