<?php

return array(
    'controllers' => array(
        'factories' => array(
            'AdminProdutosController' => 'Admin\Produto\ProdutoControllerFactory',
            'AdminComprasController' => 'Admin\Compra\CompraControllerFactory',
            'AdminController' => 'Admin\AdminControllerFactory',
            'AdminPagamentoController' => 'Admin\Pagamento\PagamentoControllerFactory',
            'AdminSiteController' => 'Admin\Site\SiteControllerFactory',
            'AdminUsuariosController' => 'Admin\Usuario\UsuarioControllerFactory'
        )
    )
);
