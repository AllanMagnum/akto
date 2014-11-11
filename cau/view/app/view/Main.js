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
			title: 'Painel 1',
			bodyStyle: 'padding:15px',
			html: 'regiao central'
		},
		{
			region: 'west',
			xtype: 'panel',
			title: 'Ferramentas de Apoio',
			width: 200,
			defaults: {
				bodyStyle: 'padding:15px'
			},
			layout: {
				type: 'accordion',
				titleCollapse: false
			},
			items: [{
                xtype: 'treepanel',
                title: 'Cadastro',
                rootVisible: false,
                root: {
                    expanded: false,
                    children: [
                        { text: "Empresas", leaf: true },
                        {
                            text: "Bancários", expanded: false, children: [
                                { text: "Bancos", leaf: true },
                                { text: "Contas", leaf: true }
                            ]
                        },
                        { text: "Unidade", leaf: true },
                        { text: "Centro de Custo", leaf: true },
                        { text: "Histórico", leaf: true },
                        { text: "Contas a Pagar", leaf: true },
                        { text: "Contas a Receber", leaf: true }
                    ]
                }
            },
            {
                xtype: 'treepanel',
                title: 'Relatórios',
                rootVisible: false,
                root: {
                    expanded: false,
                    children: [
                        { text: "Fornecedores", leaf: true },
                        {
                            text: "Contas", expanded: false, children: [
                                { text: "A Pagar", leaf: true },
                                { text: "A Receber", leaf: true }
                            ]
                        },
                        { text: "Mapa de Revenda", leaf: true }
                    ]
                }
            },
            {
                xtype: 'treepanel',
                title: 'Ferramentas',
                rootVisible: false,
                root: {
                    expanded: false,
                    children: [
                        { text: "Correções Financeiras", leaf: true },
                        { text: "Configurações Gerais", leaf: true },
                        { text: "e-mail", leaf: true },
                        { text: "Links", leaf: true },
                        { text: "LogOut", href: 'php/logout.php', leaf: true }
                    ]
                }
            }],
			collapsible: true,
			split: true
		},
		{
			region: 'east',
			xtype: 'panel',
			title: 'Painel 3',
			width: 200,
			bodyStyle: 'padding:15px',
			html: 'regiao lest',
			collapsible: true,
			split: true
		},
		{
			region: 'north',
			xtype: 'panel',
			title: 'Painel 4',
			//icon : 'image/Address Book.png',
			height: 70,
			bodyStyle: 'padding:15px',
			html: 'regiao norte',
			collapsible: true,
			split: true
		},
		{
			region: 'south',
			xtype: 'panel',
			title: 'Painel 5',
			//icon : 'image/Address Book.png',
			bodyStyle: 'padding:15px',
			html: 'regiao sul',
			collapsible: true,
			split: true
		}
	],
});