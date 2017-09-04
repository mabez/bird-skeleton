<?php
namespace BirdSkeleton\Admin;

use BirdSkeleton\Admin\Produto\Controller as ProdutoController;
use BirdSkeleton\Admin\Compra\Controller as CompraController;
use BirdSkeleton\Admin\Pagamento\Controller as PagamentoController;
use BirdSkeleton\Admin\Site\Controller as SiteController;
use BirdSkeleton\Admin\Usuario\Controller as UsuarioController;

return [
    'controllers' => [
        'factories' => [
            'AdminProdutosController' => ProdutoController::class,
            'AdminComprasController' => CompraController::class,
            'AdminController' => Controller::class,
            'AdminPagamentoController' => PagamentoController::class,
            'AdminSiteController' => SiteController::class,
            'AdminUsuariosController' => UsuarioController::class
        ]
    ]
];
