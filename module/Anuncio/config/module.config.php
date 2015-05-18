<?php

return array(
    'service_manager' => array(
        'invokables' => array(
            'Anuncio' => 'Anuncio\Service\Anuncio',
        ),
        'factories' => array(
            'PaginaAnuncios' => 'Anuncio\Factory\PaginaAnunciosModel',
            'PaginaAdminAnuncios' => 'Anuncio\Factory\PaginaAdminAnunciosModel',
            'PaginaModificarAnuncio' => 'Anuncio\Factory\PaginaModificarAnuncioModel',
            'AnuncioMapper' => 'Anuncio\Factory\AnuncioMapper'
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'AnuncioController' => 'Anuncio\Controller\AnuncioController',
            'AdminAnunciosController' => 'Anuncio\Controller\AdminController'
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'anuncio/lista' => __DIR__ . '/../view/anuncio/index/lista.twig',
            'anuncio/anuncio' => __DIR__ . '/../view/anuncio/index/anuncio.twig',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        )
    ),
    'router' => array(
       'routes' => array(
           'site' => array(
               'type' => 'Literal',
               'options' => array(
                   'route'    => '/',
                   'defaults' => array(
                       'controller' => 'AnuncioController',
                       'action'     => 'index'
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
                   )
               )
           ),
           'admin-anuncios-modificar' => array(
               'type' => 'Segment',
               'options' => array(
                   'route' => '/admin/anuncios/modificar[/:anuncioId][/:routeRedirect][/]',
                   'defaults' => array(
                       'controller' => 'AdminAnunciosController',
                       'action' => 'modificar'
                   )
               )
           ),
           'admin-anuncios-salvar' => array(
               'type' => 'Segment',
               'options' => array(
                   'route' => '/admin/anuncios/salvar[/:routeRedirect][/]',
                   'defaults' => array(
                       'controller' => 'AdminAnunciosController',
                       'action' => 'salvar'
                   )
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
               )
           )
       )
   ),
  'admin_entidades' => array(
        'anuncio' => array(
           'nome' => 'Anuncios',
           'route' => '/admin/anuncios/'
        )
    )
);