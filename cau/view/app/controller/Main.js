/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.controller.Main', {
    extend: 'Ext.app.Controller',

    models: [
             	'cau.model.Pessoa'
    ],

    stores: [
             	'cau.store.PessoaStore'
    ],

    views: [
             	'cau.view.pessoa.PessoaForm',
                'cau.view.pessoa.PessoaGrid'
    ],

    refs: [{
        ref: 'pessoaForm',
        selector: 'form'
    }],
    
    
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
            }
            
            
        });
    },

    onGridRender: function(grid, eOpts){
		grid.getStore().load();
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

    }    
    
    
});
