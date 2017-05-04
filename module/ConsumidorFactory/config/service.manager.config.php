<?php
namespace ConsumidorFactory;

return [
    'service_manager' => [
        'factories' => [
            'ConsumidorCompraViewModel' => \ConsumidorFactory\Compra\ViewModel::class,
            //'ConsumidorExpressCheckout' => 'Consumidor\Paypal\ExpressCheckoutFactory',
        ],
        'alias' => [
            'ConsumidorViewModel' => 'AcessoViewModelFactory'
        ]
    ]
];
