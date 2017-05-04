<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'ConsumidorCompraViewModel' => 'Consumidor\Compra\CompraViewModelFactory',
            //'ConsumidorExpressCheckout' => 'Consumidor\Paypal\ExpressCheckoutFactory',
            'ConsumidorViewModel' => 'AcessoFactory\AcessoViewModelFactory'
        )
    )
);
