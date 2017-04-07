<?php

namespace ProdutoFactory;

return array(
    'service_manager' => array(
        'factories' => array(
            'ProdutoManager' => Manager::class,
            'ProdutoRepository' => Repository::class
        )
    )
);