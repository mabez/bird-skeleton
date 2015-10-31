<?php
return array(
    'router' => array(
        'routes' => array(
            'login' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/login',
                    'defaults' => array(
                        'controller' => 'LoginController',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'entrar' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/entrar/',
                            'defaults' => array(
                                'controller' => 'LoginController',
                                'action' => 'entrar'
                            )
                        )
                    ),
                    'sair' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/sair/',
                            'defaults' => array(
                                'controller' => 'LoginController',
                                'action' => 'sair'
                            )
                        )
                    )
                )
            ),
            'site' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'AnuncioController',
                        'action' => 'index'
                    ),
                    'may_terminate' => true
                )
            )
        )
    )
);
