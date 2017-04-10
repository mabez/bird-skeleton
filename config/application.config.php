<?php
return [
    'modules' => [
        'Acesso',
        'AcessoFactory',
        'Admin',
        'AdminFactory',
        'AdminView',
        'Application',
        'ApplicationFactory',
        'ApplicationView',
        'AutenticacaoFactory',
        'AvancadoForm',
        'CompraFactory',
        'CompraView',
        'Conta',
        'Consumidor',
        'Login',
        'Notificacao',
        'Pagamento',
        'Paypal',
        'ProdutoFactory',
        'Site',
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
