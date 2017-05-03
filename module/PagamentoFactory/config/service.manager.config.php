<?php
namespace PagamentoFactory;

return [
    'service_manager' => [
        'factories' => [
            'PagamentoManager' => Manager::class,
            'PagamentoRepository' => Repository::class
        ]
    ]
];
