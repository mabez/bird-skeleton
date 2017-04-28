<?php
return [
    'modules' => [
        'AcessoFactory',
        'Admin',
        'AdminFactory',
        'AdminView',
        'Application',
        'ApplicationFactory',
        'ApplicationView',
        'AutenticacaoFactory',
        'CompraFactory',
        'CompraView',
        'ContaFactory',
        'Consumidor',
        'LoginFactory',
        'PagamentoFactory',
        'Paypal',
        'ProdutoFactory',
        'SiteFactory',
        'ZfcTwig',
        'Zend\Router',
        'Zend\Mvc\Plugin\FlashMessenger',
        'Zend\Form'
    ],
    'module_listener_options' => [
        'module_paths' => [
            './module',
            './vendor'
        ],
        'config_glob_paths' => [
            'config/autoload/{,*.}{global,local}.php'
        ]
    ],
    'view_manager' => [
        'strategies' => [
            'ZfcTwigViewStrategy'
        ]
    ]
];
