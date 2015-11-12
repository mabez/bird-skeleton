<?php

return array(
    'router' => array(
        'routes' => array(
            'conta-compras' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/conta/compras/',
                    'defaults' => array(
                        'controller' => 'ContaComprasController',
                        'action' => 'index'
                    ),
                    'may_terminate' => true
                )
            ),
            'conta-registro' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/conta/registro[/:routeRedirect][/]',
                    'defaults' => array(
                        'controller' => 'ContaRegistroController',
                        'action' => 'modificar'
                    ),
                    'may_terminate' => true
                )
            ),
            'conta-registro-salvar' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/conta/registro/salvar[/:routeRedirect][/]',
                    'defaults' => array(
                        'controller' => 'ContaRegistroController',
                        'action' => 'salvar'
                    ),
                    'may_terminate' => true
                )
            )
        )
    )
);
