/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.view.contatopf.ContatoPFForm',{
	
	extend: 'Ext.window.Window',	
	alias: 'widget.contatopfform',

	height: 200,
	width: 450,
	
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
			        defaults:{anchor:'100%'},
					xtype:'combo',
					fieldLabel:'TipoContato',
					emptyText:'Selecioone a Tipo de Contato ...',
					forceSelection:true,
					editable:false,
					name: 'tipoContato',					
					store: 'TipoContatoStore',
					queryMode: 'rest',
					displayField: 'descricao',
					valueField: 'descricao'
				},
				{
			        defaults:{anchor:'100%'},
					xtype:'combo',
					fieldLabel:'OperadoraContato',
					emptyText:'Selecioone a Operadora de Contato ...',
					forceSelection:true,
					editable:false,
					name: 'operadoraContato',
					store: 'OperadoraContatoStore',
					queryMode: 'rest',
					displayField: 'descricao',
					valueField: 'descricao'
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