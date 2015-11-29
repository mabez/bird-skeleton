<?php

return array(
    'service_manager' => array(
        'invokables' => array(
            'ProdutoManager' => 'Produto\ProdutoManager',
        ),
        'factories' => array(
            'ProdutoRepository' => 'Produto\ProdutoRepositoryFactory'
        )
    )
);