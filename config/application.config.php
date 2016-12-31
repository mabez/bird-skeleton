<?php

return array(
    'modules' => array(
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
        'Conta',
        'Consumidor',
        'Login',
        'Notificacao',
        'Pagamento',
        'Paypal',
        'Produto',
        'Site',
        'ValorTotalCompra',
        'ZfcTwig',
        'Zend\Router',
        'Zend\Mvc\Plugin\FlashMessenger',
        'Zend\Form'
    ),
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor',
        ),
        'config_glob_paths' => array(
            'config/autoload/{,*.}{global,local}.php',
        )
    ),
    'view_manager' => array(
        'strategies' => array('ZfcTwigViewStrategy')
    )
);
