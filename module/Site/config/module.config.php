<?php

return array(
    'router' => array(
        'routes' => array(
            'site' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'IndexController',
                        'action' => 'index'
                    )
                ),
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
        )
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'invokables' => array(
            'Site' => 'Site\Service\Site',
        ),
        'factories' => array(
            'PaginaSite' => 'Site\Factory\PaginaSiteModel',
            'PaginaAdminSite' => 'Site\Factory\PaginaAdminSiteModel',
            'SiteMapper' => 'Site\Factory\SiteMapper'
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'IndexController' => 'Site\Controller\IndexController',
            'AdminSiteController' => 'Site\Controller\AdminSiteController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.twig',
            'layout/layout/mensagens' => __DIR__ . '/../view/layout/mensagens.twig',
            'site/index/index' => __DIR__ . '/../view/site/index/index.twig',
            'site/admin/site' => __DIR__ . '/../view/site/admin/site.twig',
            'site/index/cabecalho' => __DIR__ . '/../view/site/index/cabecalho.twig',
            'error/404' => __DIR__ . '/../view/error/404.twig',
            'error/index' => __DIR__ . '/../view/error/index.twig',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'db' => array(
        'driver' => 'Pdo',
        'username' => 'bird_skeleton', //edit this
        'password' => 'bird_skeleton', //edit this
        'dsn' => 'mysql:dbname=bird_skeleton_beta1;host=localhost',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        )
    ),
    'zfctwig' => array(
        'extensions' => array(
            'Twig_Extension_Debug',
        ),
        'environment_options' => array(
            'debug' => true
        )
    ),
    'admin_entidades' => array(
        'site' => array(
            'nome' => 'Site',
            'route' => '/admin/site/'
        )
    ),
);
