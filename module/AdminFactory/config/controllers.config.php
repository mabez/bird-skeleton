<?php
namespace AdminFactory;

return [
    'controllers' => [
        'factories' => [
            'AdminProdutosController' => \AdminFactory\Produto\Controller::class,
            'AdminComprasController' => \AdminFactory\Compra\Controller::class,
            'AdminController' => Controller::class,
            'AdminPagamentoController' => \AdminFactory\Pagamento\Controller::class,
            'AdminSiteController' => \AdminFactory\Site\Controller::class,
            'AdminUsuariosController' => \AdminFactory\Usuario\Controller::class
        ]
    ]
];
