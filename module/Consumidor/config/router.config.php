<?php
return array(
    'router' => array(
        'routes' => array(
            'consumidor-comprar' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/comprar[/:anuncioId][/:routeRedirect][/]',
                    'defaults' => array(
                        'controller' => 'ConsumidorController',
                        'action' => 'comprar'
                    ),
                    'may_terminate' => true
                )
            )
        )
    )
);
