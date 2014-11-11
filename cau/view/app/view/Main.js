/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.view.Main', {
    extend: 'Ext.container.Container',
    requires:[
        'Ext.tab.Panel',
        'Ext.layout.container.Border'
    ],
    
    xtype: 'app-main',

    layout: {
        type: 'border'
    },
	
    items: [
		{
			region: 'center',
			xtype: 'panel',
			title: 'Cadastro de Usuários',
			bodyStyle: 'padding:15px',
			html: 'Grid de Pessoas e Form de Edição em Baixo'
		},
		{
			region: 'west',
			xtype: 'panel',
			title: 'Filtro por Perfil',
			width: 200,
			bodyStyle: 'padding:15px',
			html: '<h4>Escolha do Perfil:</h4> <br><br>[ ] - Administrador<br>[ ] - Operador<br>[ ] - Digitador<br>[ ] - Outros',
		},
		{
			region: 'east',
			xtype: 'panel',
			title: 'Histórico do Usuário',
			width: 400,
			bodyStyle: 'padding:15px',
			html: '<h4>Dados Histórico do Usuários:</h4> <br><br>1 - Fotos<br>2 - Dados Pessoais<br>3 - Logs de Acesso<br>4 - Etc.',
			collapsible: true,
			split: true
		},
		{
			// Topo da Tela Viewport
			region: 'north',
			xtype: 'panel',
			height: 50,
			bodyStyle: 'padding:3px',
			html: '<table><tr><td><img src="/git/akto/cau/resources/images/logo.jpg"></td><td><h3>Controle e Autenticação de Usuário</h3></td></tr></table> '
		},
		{
			region: 'south',
			xtype: 'panel',
			//title: 'Painel 5',
			bodyStyle: 'padding:5px',
			html: 'Rodapé do Sistema',
			//collapsible: true,
			//split: true
		}
	],
});