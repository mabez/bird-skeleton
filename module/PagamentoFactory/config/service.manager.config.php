<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'PagamentoManager' => 'PagamentoFactory\Manager',
            'PagamentoRepository' => 'PagamentoFactory\Repository'
        )
    )
);