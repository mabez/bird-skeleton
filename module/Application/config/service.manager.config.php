<?php
namespace BirdSkeleton\Apllication;

use Ecompassaro\Application\Factory\Produto\ViewModel as ProdutoViewModel;

return [
    'service_manager' => [
        'factories' => [
            'ProdutosViewModel' => ProdutoViewModel::class
        ]
    ]
];
