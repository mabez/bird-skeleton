<?php
namespace BirdSkeleton\Apllication;

use Ecompassaro\Application\Factory\Produto\Controller as ProdutoController;
use Ecompassaro\Application\Factory\Site\Controller as SiteController;

return [
    'controllers' => [
        'factories' => [
            'ProdutoController' => ProdutoController::class,
            'IndexController' => SiteController::class
        ]
    ]
];
