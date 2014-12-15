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
			frame:true,
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
						// column layout with 2 columns
						layout:'column',

						// defaults for columns
						defaults:{
							 columnWidth:0.5,
							 layout:'form',
							 border:false,
							 xtype:'panel',
							 bodyStyle:'padding:0 18px 0 0',
							 frame:true
						},
						items:[{
							// left column
							// defaults for fields
							 defaults:{anchor:'100%'},
							 items:[{
								 xtype:'textfield',
								 fieldLabel:'CPF',
								 name: 'cpf'
							},{
								 xtype:'datefield',
								 fieldLabel:'Data Nascimento',
								 name: 'dataNascimento'	
							}]
						},{
							// right column
							// defaults for fields
							 defaults:{anchor:'100%'},
							 items:[{
								 xtype:'combo',
								 fieldLabel:'Estado Civil',
								 name: 'enum_estadoCivil',	
								 store:["SOLTEIRO","CASADO","DIVORCIADO","VIUVO"]
							},{
								 xtype:'combo',
								 fieldLabel:'Sexo',
								 name: 'enum_sexo',	
								 store:["MASCULINO","FEMININO"]
							}]
						}]
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
						xtype: 'combo',
				        name: 'enum_cor',
				        fieldLabel: 'Cor',
				        store:["BRANCA","FEMININO"]
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
					text: 'Atualizar',
					itemId: 'save',
					iconCls: 'icon-save'
				},
				{
					xtype: 'button',
					text: 'Salvar',
					itemId: 'save2',
					iconCls: 'icon-save'
				}
			]
		}
	]
});