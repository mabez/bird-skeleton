<?php

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'invokables' => array(
            'Anuncio' => 'Application\Service\Anuncio',
            'Site' => 'Application\Service\Site',
        ),
        'factories' => array(
            'PaginaAnuncios' => 'Application\Factory\PaginaAnunciosModel',
            'AnuncioMapper' => 'Application\Factory\AnuncioMapper',
            'SiteMapper' => 'Application\Factory\SiteMapper'
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.twig',
            'application/index/index' => __DIR__ . '/../view/application/index/index.twig',
            'error/404'               => __DIR__ . '/../view/error/404.twig',
            'error/index'             => __DIR__ . '/../view/error/index.twig',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'db' => array(
         'driver'         => 'Pdo',
         'username'       => 'bird_skeleton',  //edit this
         'password'       => 'bird_skeleton',  //edit this
         'dsn'            => 'mysql:dbname=bird_skeleton_alpha;host=localhost',
     ),
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    )
);
