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
                    'login-entrar' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/entrar/',
                            'defaults' => array(
                                'controller' => 'LoginController',
                                'action' => 'entrar'
                            )
                        )
                    ),
                    'login-registrar' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/registrar/',
                            'defaults' => array(
                                'controller' => 'RegistrarController',
                                'action' => 'registrar'
                            )
                        )
                    )
                )
            ),
            'registrar' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/registrar',
                    'defaults' => array(
                        'controller' => 'RegistrarController',
                        'action' => 'index'
                    )
                )
            ),
            'sair' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/logout',
                    'defaults' => array(
                        'controller' => 'SairController',
                        'action' => 'sair'
                    )
                )
            ),
        )
    )
);
