/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.controller.Main', {
    extend: 'Ext.app.Controller',

    models: [
             	'cau.model.Pessoa',
             	'cau.model.EnderecoPF',
             	'cau.model.DocumentoPF',
             	'cau.model.ContatoPF'
    ],

    stores: [
             	'cau.store.PessoaStore',
             	'cau.store.EnderecoPFStore',
             	'cau.store.DocumentoPFStore',
             	'cau.store.ContatoPFStore'
    ],

    views: [
            	'cau.view.MenuPrincipal',
             	'cau.view.pessoa.PessoaForm',
                'cau.view.pessoa.PessoaGrid',
            	'cau.view.enderecopf.EnderecoPFForm',
                'cau.view.enderecopf.EnderecoPFGrid',
            	'cau.view.documentopf.DocumentoPFForm',
                'cau.view.documentopf.DocumentoPFGrid',            	
            	'cau.view.contatopf.ContatoPFForm',
            	'cau.view.contatopf.ContatoPFGrid'
    ],

    refs: [
          {
        	  ref: 'pessoaForm',
        	  selector: 'form'
          },{
        	  ref: 'enderecoPFForm',
        	  selector: 'form'
          }
    ],
    
    init: function() {

        this.control({
            'pessoagrid': {
                selectionchange: this.gridSelectionChange,
                viewready: this.onViewReady,
                render : this.onGridRender,
            },
            "pessoagrid button#add": {
                click : this.onAddClick
            },
            "enderecopfgrid button#addenderecopf": {
                click : this.onAddEnderecoPFClick
            },
            "contatopfgrid button#addcontatopf": {
                click : this.onAddContatoPFClick
            },
            "documentopfgrid button#adddocumentopf": {
                click : this.onAddDocumentoPFClick
            },
            "pessoagrid button#delete": {
                click : this.onDeleteClick
            },
            "pessoaform button#cancel": {
                click : this.onCancelClick
            },
            "pessoaform button#save": {
                click : this.onSaveClick
            },
            "pessoaform button#save2": {
                click : this.onSave2Click
            },
            "enderecopfform button#saveenderecopf":{
            	click : this.onSaveEnderecoClick
            },
            "enderecopfform button#cancel":{
            	click : this.onCancelClick
            }
            
        });
    },

    onGridRender: function(grid, eOpts){
		grid.getStore().load();
	},

    openFormEnderecoPF: function(title){

        var win = Ext.create('cau.view.enderecopf.EnderecoPFForm');

        win.setTitle(title);

        return win;
    },

    openFormContatoPF: function(title){

        var win = Ext.create('cau.view.contatopf.ContatoPFForm');

        win.setTitle(title);

        return win;
    },
    
    openFormDocumentoPF: function(title){

        var win = Ext.create('cau.view.documentopf.DocumentoPFForm');

        win.setTitle(title);

        return win;
    },

    
    onAddEnderecoPFClick: function(btn, e, eOpts ){
        this.openFormEnderecoPF('Novo Endereço');
    },

    onAddContatoPFClick: function(btn, e, eOpts ){
        this.openFormContatoPF('Novo Contato');
    },

    onAddDocumentoPFClick: function(btn, e, eOpts ){
        this.openFormDocumentoPF('Novo Documento');
    },
    
    gridSelectionChange: function(model, records) {

        if (records[0]) {
             this.getPessoaForm().getForm().loadRecord(records[0]);
        }
    },
    
    onViewReady: function(grid) {
        grid.getSelectionModel().select(0);
    },
    
    onCancelClick: function(btn, e, eOpts){
        
    	this.getPessoaForm().getForm().reset();

    },

    onAddClick: function(btn, e, eOpts ){
        
    	this.getPessoaForm().getForm().reset();
    },

    onDeleteClick: function(btn, e, eOpts){
  
    	 Ext.MessageBox.confirm({
             title          : 'Aviso!'
             ,animateTarget : btn.el
             ,msg           : 'Deseja apagar esse registro(s)?'
             ,buttons       : Ext.MessageBox.YESNO
             ,icon          : 'icon-window-question'
             ,scope         : this
             ,fn            : function(button) {
                 if(button === 'yes') {
                	 var grid = btn.up('grid');
                   var records = grid.getSelectionModel().getSelection();
                   var store = grid.getStore();
                   store.remove(records);
                   store.sync();
                	 
                 }
             }
         });

    },

    onSaveClick: function(btn, e, eOpts){

        var form = this.getPessoaForm().getForm(),
            values = form.getValues(),
            record = form.getRecord(),
            grid = Ext.ComponentQuery.query('pessoagrid')[0],
            store = grid.getStore();

        if (record){ //edicao
            
            record.set(values);

        } else { //novo registro 

            var pessoa = Ext.create('cau.model.Pessoa',{
            	
            	nome: 			  	values.nome,
            	cpf: 				values.cpf,
            	dataNascimento:		values.dataNascimento,
            	enum_estadoCivil: 	values.enum_estadoCivil,
            	enum_sexo: 			values.enum_sexo,
            	nomePai:		 	values.nomePai,
            	nomeMae: 			values.nomeMae,
            	enum_cor: 			values.enum_cor,
            	naturalidade: 		values.naturalidade,
            	nacionalidade: 		values.nacionalidade
            });

            store.insert(0,pessoa);
        }

        store.sync();

    },    

    onSave2Click: function(btn, e, eOpts){

        var form = this.getPessoaForm().getForm(),
            values = form.getValues(),
            record = form.getRecord(),
            grid = Ext.ComponentQuery.query('pessoagrid')[0],
            store = grid.getStore();

        var pessoa = Ext.create('cau.model.Pessoa',{
        	
        	nome: 			  	values.nome,
        	cpf: 				values.cpf,
        	dataNascimento:		values.dataNascimento,
        	enum_estadoCivil: 	values.enum_estadoCivil,
        	enum_sexo: 			values.enum_sexo,
        	nomePai:		 	values.nomePai,
        	nomeMae: 			values.nomeMae,
        	enum_cor: 			values.enum_cor,
        	naturalidade: 		values.naturalidade,
        	nacionalidade: 		values.nacionalidade
        });

        store.insert(0,pessoa);

        store.sync();
        grid.getView().refresh();

    },    
    
    onSaveEnderecoClick: function(btn, e, eOpts){

        var form1 = this.getEnderecoPFForm().getForm(),
            values1 = form1.getValues(),
            record1 = form1.getRecord(),
            grid1 = Ext.ComponentQuery.query('enderecopfgrid')[0],
            store1 = grid1.getStore();

        
        
        if (record1){ //edicao
            
            record1.set(values1);

        } else { //novo registro
        
        	var endereco = Ext.create('cau.model.EnderecoPF',{
        	
        		id: 	         values1.id,
        		tipoEndereco: 	 values1.tipoEndereco,
        		logradouro: 	 values1.logradouro,
        		numero:		     values1.numero,
        		complemento: 	 values1.complemento,
        		bairro: 		 values1.bairro,
        		cep:		 	 values1.cep,
        		cidade: 		 values1.cidade
        	});
        	
        	//console.log(values.id);
        	
        	store1.insert(0,endereco);
        	
        }
        
        store1.sync();
        
        grid1.getView().refresh();

    },
    
    onCancelEnderecoClick: function(btn, e, eOpts){
        
    	this.getEnderecoPFForm().getForm().reset();

    } 
    
    
});
