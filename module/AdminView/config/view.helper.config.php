<?php
use ValorTotalCompraFactory\ViewHelper as ValorTotalCompraFactory;
use ValorTotalCompra\ViewHelper as ValorTotalCompra;

return [
    'view_helper' => [
        'factories' => [
            ValorTotalCompra::class => ValorTotalCompraFactory::class
        ]
    ],
    'aliases' => [
        'valorTotalCompra' => ValorTotalCompra::class
    ]
];
