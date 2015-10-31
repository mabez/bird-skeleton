<?php

return array(
    'router' => array(
        'routes' => array(
            'admin' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin/',
                    'defaults' => array(
                       '__NAMESPACE__' => 'Admin',
                        'controller' => 'AdminController',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action]][/]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            )
                        ),
                        'may_terminate' => true
                    )
                )
            ),
            'admin-anuncios' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin/anuncios/',
                    'defaults' => array(
                        'controller' => 'AdminAnunciosController',
                        'action' => 'index'
                    ),
                    'may_terminate' => true
                )
            ),
            'admin-anuncios-modificar' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/anuncios/modificar[/:anuncioId][/:routeRedirect][/]',
                    'defaults' => array(
                        'controller' => 'AdminAnunciosController',
                        'action' => 'modificar'
                    ),
                    'may_terminate' => true
                )
            ),
            'admin-anuncios-remover' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/anuncios/remover/:anuncioId[/:routeRedirect][/]',
                    'defaults' => array(
                        'controller' => 'AdminAnunciosController',
                        'action' => 'remover'
                    )
                ),
                'may_terminate' => true
            ),
            'admin-anuncios-salvar' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/anuncios/salvar[/:routeRedirect][/]',
                    'defaults' => array(
                        'controller' => 'AdminAnunciosController',
                        'action' => 'salvar'
                    ),
                    'may_terminate' => true
                )
            ),
            'admin-site' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin/site/',
                    'defaults' => array(
                        'controller' => 'AdminSiteController',
                        'action' => 'index'
                    )
                )
            ),
            'admin-site-salvar' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin/site/salvar/',
                    'defaults' => array(
                        'controller' => 'AdminSiteController',
                        'action' => 'salvar'
                    )
                )
            )
        )
    )
);
