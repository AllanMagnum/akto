/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.view.pessoa.PessoaForm',{
	
	extend: 'Ext.panel.Panel',	
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
					},
					{
						xtype: 'textfield',
				        name: 'nome',
				        fieldLabel: 'Nome'
					},
					{
						xtype: 'textfield',
				        name: 'telefoneMovel',
				        fieldLabel: 'Telefone movel'
					},
					{
						xtype: 'textfield',
				        name: 'telefoneFixo',
				        fieldLabel: 'Telefone fixo'
					},
					{
						xtype: 'textfield',
				        name: 'telefoneAdicional',
				        fieldLabel: 'Telefone adicional'
					},
					{
						xtype: 'textfield',
				        name: 'email',
				        fieldLabel: 'E-mail'
					},
					{
						xtype: 'textfield',
				        name: 'emailAdicional',
				        fieldLabel: 'E-mail adiconal'
					},
					{
						xtype: 'textfield',
				        name: 'logradouro',
				        fieldLabel: 'Logradouro'
					},
					{
						xtype: 'textfield',
				        name: 'numero',
				        fieldLabel: 'Numero'
					},
					{
						xtype: 'textfield',
				        name: 'complemento',
				        fieldLabel: 'Complemento'
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