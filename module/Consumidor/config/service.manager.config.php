<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'CompraViewModel' => 'Consumidor\Compra\CompraViewModelFactory',
            'ExpressCheckout' => 'Consumidor\Paypal\ExpressCheckoutFactory'
        )
    )
);
