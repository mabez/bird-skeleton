<?php
return array(
    'router' => array(
        'routes' => array(
            'site' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'AnuncioController',
                        'action' => 'index'
                    ),
                    'may_terminate' => true
                )
            )
        )
    )
);
