<?php
return [
    'router' => [
        'routes' => [
            'admin' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/admin/',
                    'defaults' => [
                        '__NAMESPACE__' => 'Admin',
                        'controller' => 'AdminController',
                        'action' => 'index'
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'default' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/[:controller[/:action]][/]',
                            'constraints' => [
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                            ],
                            'defaults' => []
                        ],
                        'may_terminate' => true
                    ]
                ]
            ],
            'admin-produto' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/admin/produtos/',
                    'defaults' => [
                        'controller' => 'AdminProdutosController',
                        'action' => 'index'
                    ],
                    'may_terminate' => true
                ]
            ],
            'admin-produtos-modificar' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/admin/produtos/modificar[/:produtoId][/:routeRedirect][/]',
                    'defaults' => [
                        'controller' => 'AdminProdutosController',
                        'action' => 'modificar'
                    ],
                    'may_terminate' => true
                ]
            ],
            'admin-produtos-remover' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/admin/produtos/remover/:produtoId[/:routeRedirect][/]',
                    'defaults' => [
                        'controller' => 'AdminProdutosController',
                        'action' => 'remover'
                    ]
                ],
                'may_terminate' => true
            ],
            'admin-produtos-salvar' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/admin/produtos/salvar[/:routeRedirect][/]',
                    'defaults' => [
                        'controller' => 'AdminProdutosController',
                        'action' => 'salvar'
                    ],
                    'may_terminate' => true
                ]
            ],
            'admin-compras' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/admin/compras/',
                    'defaults' => [
                        'controller' => 'AdminComprasController',
                        'action' => 'index'
                    ],
                    'may_terminate' => true
                ]
            ],
            'admin-pagamentos' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/admin/pagamentos/',
                    'defaults' => [
                        'controller' => 'AdminPagamentoController',
                        'action' => 'index'
                    ],
                    'may_terminate' => true
                ]
            ],
            'admin-site' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/admin/site/',
                    'defaults' => [
                        'controller' => 'AdminSiteController',
                        'action' => 'index'
                    ]
                ]
            ],
            'admin-site-salvar' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/admin/site/salvar/',
                    'defaults' => [
                        'controller' => 'AdminSiteController',
                        'action' => 'salvar'
                    ]
                ]
            ],
            'admin-usuario' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/admin/usuario/',
                    'defaults' => [
                        'controller' => 'AdminUsuariosController',
                        'action' => 'index'
                    ]
                ]
            ],
            'admin-usuario-modificar' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/admin/usuario/modificar[/:usuarioId][/:routeRedirect][/]',
                    'defaults' => [
                        'controller' => 'AdminUsuariosController',
                        'action' => 'modificar'
                    ],
                    'may_terminate' => true
                ]
            ],
            'admin-usuario-remover' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/admin/usuario/remover/:usuarioId[/:routeRedirect][/]',
                    'defaults' => [
                        'controller' => 'AdminUsuariosController',
                        'action' => 'remover'
                    ]
                ],
                'may_terminate' => true
            ],
            'admin-usuario-salvar' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/admin/usuario/salvar[/:routeRedirect][/]',
                    'defaults' => [
                        'controller' => 'AdminUsuariosController',
                        'action' => 'salvar'
                    ],
                    'may_terminate' => true
                ]
            ]
        ]
    ]
];
