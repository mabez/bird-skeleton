<?php
namespace BirdSkeleton\Admin;

use BirdSkeleton\Admin\Produto\ViewModel as ProdutoViewModel;
use BirdSkeleton\Admin\Compra\ViewModel as CompraViewModel;
use BirdSkeleton\Admin\Produto\ModificarViewModel as ProdutoModificarViewModel;
use BirdSkeleton\Admin\Usuario\ModificarViewModel as UsuarioModificarViewModel;
use BirdSkeleton\Admin\Pagamento\ViewModel as PagamentoViewModel;
use BirdSkeleton\Admin\Site\ViewModel as SiteViewModel;
use BirdSkeleton\Admin\Usuario\ViewModel as UsuarioViewModel;

return [
    'service_manager' => [
        'factories' => [
            'AdminProdutosViewModel' => ProdutoViewModel::class,
            'AdminCompraViewModel' => CompraViewModel::class,
            'AdminModificarProdutoViewModel' => ProdutoModificarViewModel::class,
            'AdminModificarUsuarioViewModel' => UsuarioModificarViewModel::class,
            'AdminPagamentoViewModel' => PagamentoViewModel::class,
            'AdminSiteViewModel' => SiteViewModel::class,
            'AdminUsuarioViewModel' => UsuarioViewModel::class,
            'AdminViewModel' => ViewModel::class
        ]
    ]
];
