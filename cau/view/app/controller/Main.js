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
             	'cau.store.Pessoa'
    ],

    views: [
             	'cau.view.pessoa.PessoaForm',
                'cau.view.pessoa.PessoaGrid'
    ]    	
    	
});
