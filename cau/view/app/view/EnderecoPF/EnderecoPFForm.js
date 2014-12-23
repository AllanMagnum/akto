/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */


Ext.define('cau.view.enderecopf.EnderecoPFForm',{
	
	extend: 'Ext.panel.Panel',	
	alias: 'widget.enderecopfform',

	height: 200,
	width: 350,
	layout:'column',

	// defaults for columns
	defaults:{
		columnWidth:0.5,
		layout:'form',
		border:false,
		xtype:'panel',
		bodyStyle:'padding:0 18px 0 0',
		frame:true,
		anchor:'100%'
	},
    items:[{
    		
		// left column
		// defaults for fields
		 defaults:{anchor:'100%'},
		 items:[{
			 xtype:'textfield',
			 fieldLabel:'Tipo',
			 name: 'tipoEndereco'
		},{
			 xtype:'textfield',
			 fieldLabel:'Logradouro',
			 name: 'logradouro'	
		},{
			 xtype:'textfield',
			 fieldLabel:'Numero',
			 name: 'numero'	
		}]
	},{
		// right column
		// defaults for fields
		 defaults:{anchor:'100%'},
		 items:[{
			 xtype:'textfield',
			 fieldLabel:'Complemento',
			 name: 'complemento'
		},{
			 xtype:'textfield',
			 fieldLabel:'Bairro',
			 name: 'bairro'
		},{
			 xtype:'textfield',
			 fieldLabel:'CEP',
			 name: 'cep'
		},{
			 xtype:'textfield',
			 fieldLabel:'Cidade',
			 name: 'cidade'
		}]
	}]
});