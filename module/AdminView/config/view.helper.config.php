<?php
namespace AdminView;

use Ecompassaro\CompraView\ValorTotal\Helper as ValorTotalViewHelper;
use Zend\I18n\View\Helper\CurrencyFormat;

return [
    'aliases' => [
        'valorTotalCompra' => ValorTotalViewHelper::class
    ],
    'invokables' => [
        'currencyFormat' => CurrencyFormat::class
    ]
];
