<?php
return array(
    'controllers' => array(
        'factories' => array(
            'ProdutoController' => \Ecompassaro\Application\Factory\Produto\Controller::class,
            'IndexController' => \Ecompassaro\Application\Factory\Site\Controller::class
        )
    )
);
