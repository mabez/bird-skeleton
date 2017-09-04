<?php
namespace BirdSkeleton\Conta;

use Zend\I18n\View\Helper\CurrencyFormat;
use BirdSkeleton\Login\Identificacao\IdViewHelper as IdentificacaoIdViewHelperFactory;
use Ecompassaro\CompraView\ValorTotal\Helper as ValorTotalViewHelper;

return [
    'factories' => [
        'identificacaoId' => IdentificacaoIdViewHelperFactory::class
    ],
    'invokables' => [
        'currencyFormat' => CurrencyFormat::class
    ],
    'aliases' => [
        'valorTotalCompra' => ValorTotalViewHelper::class
    ]
];
