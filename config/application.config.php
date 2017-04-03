<?php
return [
    'modules' => [
        'ValorTotalCompra',
        'ValorTotalCompraFactory',
        'Acesso',
        'AcessoFactory',
        'Admin',
        'AdminFactory',
        'AdminView',
        'Application',
        'ApplicationFactory',
        'ApplicationView',
        'Autenticacao',
        'AutenticacaoFactory',
        'AvancadoForm',
        'Compra',
        'CompraFactory',
        'Conta',
        'Consumidor',
        'Login',
        'Notificacao',
        'Pagamento',
        'Paypal',
        'Produto',
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
