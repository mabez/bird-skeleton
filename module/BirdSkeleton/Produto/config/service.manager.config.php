<?php
namespace BirdSkeleton\Produto;

return [
    'service_manager' => [
        'factories' => [
            'ProdutoManager' => \Ecompassaro\Produto\Factory\Manager::class,
            'ProdutoRepository' => \Ecompassaro\Produto\Factory\Repository::class
        ]
    ]
];
