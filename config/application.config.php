<?php
return [
    'modules' => [
        'BirdSkeleton\Acesso',
        'BirdSkeleton\Admin',
        'BirdSkeleton\Application',
        'BirdSkeleton\Autenticacao',
        'BirdSkeleton\Compra',
        'BirdSkeleton\Conta',
        'BirdSkeleton\Consumidor',
        'BirdSkeleton\Login',
        'BirdSkeleton\Pagamento',
        'BirdSkeleton\Produto',
        'BirdSkeleton\Site',
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
