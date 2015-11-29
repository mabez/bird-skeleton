<?php

return array(
    'service_manager' => array(
        'invokables' => array(
           'PagamentoManager' => 'Pagamento\PagamentoManager'
        ),
        'factories' => array(
            'PagamentoRepository' => 'Pagamento\PagamentoRepositoryFactory'
        )
    )
);