/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */


Ext.define('cau.view.contatopf.ContatoPFForm',{
	
	extend: 'Ext.panel.Panel',	
	alias: 'widget.contatopfform',

	height: 200,
	width: 350,
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
});