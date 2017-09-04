<?php
namespace BirdSkeleton\Compra;

use Ecompassaro\CompraView\ValorTotal\Helper as Helper;
use BirdSkeleton\Compra\View\ValorTotal\Helper as Factory;

return [
    'factories' => [
        Helper::class => Factory::class
    ]
];
