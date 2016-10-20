<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'PagamentoManager' => 'Pagamento\PagamentoManagerFactory',
            'PagamentoRepository' => 'Pagamento\PagamentoRepositoryFactory'
        )
    )
);