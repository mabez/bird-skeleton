<?php
namespace BirdSkeleton\Pagamento;

return [
    'service_manager' => [
        'factories' => [
            'PagamentoManager' => Manager::class,
            'PagamentoRepository' => Repository::class
        ]
    ]
];
