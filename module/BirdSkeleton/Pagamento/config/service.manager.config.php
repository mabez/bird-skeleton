<?php
namespace BirdSkeleton\Pagamento;

var_dump(Manager::class);die;

return [
    'service_manager' => [
        'factories' => [
            'PagamentoManager' => Manager::class,
            'PagamentoRepository' => Repository::class
        ]
    ]
];
