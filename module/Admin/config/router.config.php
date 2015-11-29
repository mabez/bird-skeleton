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
            'admin-produto' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin/produtos/',
                    'defaults' => array(
                        'controller' => 'AdminProdutosController',
                        'action' => 'index'
                    ),
                    'may_terminate' => true
                )
            ),
            'admin-produtos-modificar' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/produtos/modificar[/:produtoId][/:routeRedirect][/]',
                    'defaults' => array(
                        'controller' => 'AdminProdutosController',
                        'action' => 'modificar'
                    ),
                    'may_terminate' => true
                )
            ),
            'admin-produtos-remover' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/produtos/remover/:produtoId[/:routeRedirect][/]',
                    'defaults' => array(
                        'controller' => 'AdminProdutosController',
                        'action' => 'remover'
                    )
                ),
                'may_terminate' => true
            ),
            'admin-produtos-salvar' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/produtos/salvar[/:routeRedirect][/]',
                    'defaults' => array(
                        'controller' => 'AdminProdutosController',
                        'action' => 'salvar'
                    ),
                    'may_terminate' => true
                )
            ),
            'admin-compras' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin/compras/',
                    'defaults' => array(
                        'controller' => 'AdminComprasController',
                        'action' => 'index'
                    ),
                    'may_terminate' => true
                )
            ),
            'admin-pagamentos' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin/pagamentos/',
                    'defaults' => array(
                        'controller' => 'AdminPagamentoController',
                        'action' => 'index'
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
            ),
            'admin-usuario' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin/usuario/',
                    'defaults' => array(
                        'controller' => 'AdminUsuariosController',
                        'action' => 'index'
                    )
                )
            ),
            'admin-usuario-modificar' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/usuario/modificar[/:usuarioId][/:routeRedirect][/]',
                    'defaults' => array(
                        'controller' => 'AdminUsuariosController',
                        'action' => 'modificar'
                    ),
                    'may_terminate' => true
                )
            ),
            'admin-usuario-remover' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/usuario/remover/:usuarioId[/:routeRedirect][/]',
                    'defaults' => array(
                        'controller' => 'AdminUsuariosController',
                        'action' => 'remover'
                    )
                ),
                'may_terminate' => true
            ),
            'admin-usuario-salvar' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/usuario/salvar[/:routeRedirect][/]',
                    'defaults' => array(
                        'controller' => 'AdminUsuariosController',
                        'action' => 'salvar'
                    ),
                    'may_terminate' => true
                )
            )
        )
    )
);
