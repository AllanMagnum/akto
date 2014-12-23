/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */


Ext.define('cau.view.documentopf.DocumentoPFForm',{
	
	extend: 'Ext.panel.Panel',	
	alias: 'widget.documentopfform',

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
			 name: 'tipoDocumento'
		},{
			 xtype:'textfield',
			 fieldLabel:'Numero',
			 name: 'numero'	
		},{
			 xtype:'datefield',
			 fieldLabel:'Data Emissão',
			 name: 'dataEmissao'	
		}]
	},{
		// right column
		// defaults for fields
		 defaults:{anchor:'100%'},
		 items:[{
			 xtype:'textfield',
			 fieldLabel:'Orgão Emissor',
			 name: 'orgaoEmissor'
		},{
			 xtype:'textfield',
			 fieldLabel:'Via',
			 name: 'via'
		}]
	}]
});