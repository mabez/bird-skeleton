<?php
return [
    'router' => [
        'routes' => [
            'site' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => 'ProdutoController',
                        'action' => 'index'
                    ],
                    'may_terminate' => true
                ]
            ]
        ]
    ]
];
