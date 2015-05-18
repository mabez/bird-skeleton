<?php

return array(
    'router' => array(
        'routes' => array(
            'login' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/login/',
                    'defaults' => array(
                        'controller' => 'LoginController',
                        'action'     => 'index'
                    )
                )
            ),
            'login-entrar' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/login/entrar/',
                    'defaults' => array(
                        'controller' => 'LoginController',
                        'action'     => 'entrar'
                    )
                )
            ),
            'login-sair' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/login/sair/',
                    'defaults' => array(
                        'controller' => 'LoginController',
                        'action'     => 'sair'
                    )
                )
            )
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'PaginaLogin' => 'Login\Factory\PaginaLoginModel',
            'LoginMapper' => 'Login\Factory\LoginMapper',
            'IdentificacaoGenerator' => 'Login\Factory\IdentificacaoGenerator',
            'LoginAdapter' => 'Login\Factory\LoginAdapter'
        ),
        'invokables' => array(
            'Login' => 'Login\Service\Login',
            'Identificacao' => 'Login\Service\Identificacao',
            'IdentificacaoMapper' => 'Login\Mapper\Identificacao'
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'LoginController' => 'Login\Controller\LoginController'
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'login/index' => __DIR__ . '/../view/login/index/index.twig',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        )
    )
);