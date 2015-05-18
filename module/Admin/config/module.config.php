<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'PaginaAdmin' => 'Admin\Factory\PaginaAdminModel',
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'AdminController' => 'Admin\Controller\IndexController'
        )
    ),
    'view_manager' => array(
        'template_map' => array(
            'admin/index/index' => __DIR__ . '/../view/admin/index/index.twig',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'router' => array(
        'routes' => array(
            'admin' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin/',
                    'defaults' => array(
                        'controller' => 'AdminController',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            )
                        )
                    )
                )
            )
        )
    ),
    'admin_entidades' => array(
    //
    // configurações de entidades administradas
    //
    )
);
