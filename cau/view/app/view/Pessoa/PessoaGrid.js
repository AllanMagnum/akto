/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */


Ext.define('cau.view.pessoa.PessoaGrid',{
	extend: 'Ext.grid.Panel',
	alias: 'widget.pessoagrid',
	title: 'Cadastro de Usuários',
	iconCls: 'icon-grid',
	store: 'PessoaStore',

	columns: [
		{ text: 'Id',  dataIndex: 'id' },
        { text: 'Nome', dataIndex: 'nome', flex: 1 },
        { text: 'Telefone movel', dataIndex: 'telefoneMovel' },
        { text: 'Telefone fixo', dataIndex: 'telefoneFixo' },
        { text: 'Telefone adicional', dataIndex: 'telefoneAdicional' },
        { text: 'E-mail', dataIndex: 'email' },
        { text: 'E-mail adicional', dataIndex: 'emailAdicional' },
        { text: 'Logradouro', dataIndex: 'logradouro' },
        { text: 'Numero', dataIndex: 'numero' },
        { text: 'Complemento', dataIndex: 'complemento' },
        { text: 'Bairro', dataIndex: 'bairro' },
        { text: 'Cep', dataIndex: 'cep' },
        { text: 'Data cadastro', dataIndex: 'dataCadastro' },
        { text: 'Data atualizacao', dataIndex: 'dataAtualizacao' }
	],

	dockedItems: [
		{
			xtype: 'toolbar',
			dock: 'top',
			items: [
				{
					xtype: 'button',
					text: 'Novo',
					itemId: 'add',
					iconCls: 'icon-add'
				},
				{
					xtype: 'button',
					text: 'Excluir',
					itemId: 'delete',
					iconCls: 'icon-delete'
				}
			]
		},
		{
			xtype: 'pagingtoolbar',
	        store: 'PessoaStore',
	        dock: 'bottom',
	        displayInfo: true,
	        emptyMsg: 'Nenhuma Pessoa encontrada'
		}
	]
	

});