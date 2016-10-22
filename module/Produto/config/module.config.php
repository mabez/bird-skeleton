<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'ProdutoManager' => 'Produto\ProdutoManagerFactory',
            'ProdutoRepository' => 'Produto\ProdutoRepositoryFactory'
        )
    )
);