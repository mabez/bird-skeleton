<?php
return [
    'router' => [
        'routes' => [
            'comprar' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/comprar[/:produtoId][/:routeRedirect][/]',
                    'defaults' => [
                        'controller' => 'ConsumidorController',
                        'action' => 'executarCompra'
                    ],
                    'may_terminate' => true
                ]
            ],
            'consumidor-comprar' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/produto/comprar[/:produtoId][/:routeRedirect][/]',
                    'defaults' => [
                        'controller' => 'ConsumidorController',
                        'action' => 'comprar'
                    ],
                    'may_terminate' => true
                ]
            ]
        ]
    ]
];
