<?php
return array(
    'router' => array(
        'routes' => array(
            'comprar' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/comprar[/:produtoId][/:routeRedirect][/]',
                    'defaults' => array(
                        'controller' => 'ConsumidorController',
                        'action' => 'executarCompra'
                    ),
                    'may_terminate' => true
                )
            ),
            'consumidor-comprar' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/produto/comprar[/:produtoId][/:routeRedirect][/]',
                    'defaults' => array(
                        'controller' => 'ConsumidorController',
                        'action' => 'comprar'
                    ),
                    'may_terminate' => true
                )
            )
        )
    )
);
