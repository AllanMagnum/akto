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
            "pessoaform button#cancel": {
                click : this.onCancelClick
            },
            "pessoaform button#save": {
                click : this.onSaveClick
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
            	telefoneMovel: 		values.telefoneMovel,
            	telefoneFixo: 		values.telefoneFixo,
            	telefoneAdicional: 	values.telefoneAdicional,
            	email: 				values.email,
            	emailAdicional: 	values.emailAdicional,
            	logradouro: 		values.logradouro,
            	numero: 			values.numero,
            	complemento: 		values.complemento,
            	bairro: 			values.bairro,
            	cep: 				values.cep
            });

            store.insert(0,pessoa);
        }

        store.sync();

    }    
    	
});
