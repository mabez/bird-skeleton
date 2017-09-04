<?php

namespace BirdSkeleton\Consumidor;

return [
    'service_manager' => [
        'factories' => [
            'ConsumidorCompraViewModel' => Compra\ViewModel::class,
            //'ConsumidorExpressCheckout' => 'Consumidor\Paypal\ExpressCheckoutFactory',
        ],
        'aliases' => [
            'ConsumidorViewModel' => 'AcessoViewModel'
        ]
    ]
];
