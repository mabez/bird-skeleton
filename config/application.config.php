<?php
return [
    'modules' => [
        'Acesso',
        'Admin',
        'Application',
        'Autenticacao',
        'Compra',
        'Conta',
        'Consumidor',
        'Login',
        'Pagamento',
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
