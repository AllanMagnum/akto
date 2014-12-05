/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.view.pessoa.PessoaForm',{
	
	extend: 'Ext.tab.Panel',	
	alias: 'widget.pessoaform',

	height: 200,
	width: 350,
	layout: 'fit',
	iconCls: 'icon-user',
	title: 'Editar/Criar Pessoa',
	autoShow: true,

	items: [
		{
			title: 'Dados Gerais',
			xtype: 'form',
			bodyPadding: 10,
			defaults: {
				anchor: '100%'
			},
			autoScroll:true,
			itemId: 'gerais',
			items: [
					{
						xtype: 'hiddenfield',
				        name: 'id'
					},
					{
						xtype: 'textfield',
				        name: 'nome',
				        fieldLabel: 'Nome',
				        allowBlank: false
					},
					{
						xtype: 'textfield',
				        name: 'cpf',
				        fieldLabel: 'Cpf'
					},
					{
						xtype: 'textfield',
				        name: 'dataNascimento',
				        fieldLabel: 'Data Nascimento'
					},
					{
						xtype: 'textfield',
				        name: 'enum_sexo',
				        fieldLabel: 'Sexo'
					},
					{
						xtype: 'textfield',
				        name: 'nomePai',
				        fieldLabel: 'Nome do Pai'
					},
					{
						xtype: 'textfield',
				        name: 'nomeMae',
				        fieldLabel: 'Nome da Mâe'
					},
					{
						xtype: 'textfield',
				        name: 'enum_cor',
				        fieldLabel: 'Cor'
					},
					{
						xtype: 'textfield',
				        name: 'naturalidade',
				        fieldLabel: 'Naturalidade'
					},
					{
						xtype: 'textfield',
				        name: 'nacionalidade',
				        fieldLabel: 'Nacionalidade'
					}
				]
		}, {
	        title: 'Endereço',
	        html: 'Tickets',
	        itemId: 'endereco'
	    }, {
	        title: 'Contato',
	        html: 'Contatos',
	        itemId: 'contato'
	    }, {
	        title: 'Documentos',
	        html: 'Documentos',
	        itemId: 'documento'
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