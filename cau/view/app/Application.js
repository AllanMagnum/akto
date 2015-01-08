/**
 * Controle e Autenticação de usuários - CAU 
 * Outubro/2014
 * Desenvolvedores : Allan Magnum e Nilton Caldas Jr.
 */

Ext.define('cau.Application', {
    name: 'cau',

    extend: 'Ext.app.Application',

    views: [
        // TODO: add views here
    ],

    controllers: [
        // TODO: add controllers here
        'Main'
    ],

    stores: [
        // TODO: add stores here
        'PessoaStore',
        'EnderecoPFStore',
        'ContatoPFStore',
        'DocumentoPFStore',
        'CidadeStore'
    ]
});
