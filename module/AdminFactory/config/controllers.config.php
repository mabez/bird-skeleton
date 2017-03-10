<?php

return array(
    'controllers' => array(
        'factories' => array(
            'AdminProdutosController' => 'AdminFactory\Produto\ProdutoControllerFactory',
            'AdminComprasController' => 'AdminFactory\Compra\CompraControllerFactory',
            'AdminController' => 'AdminFactory\AdminControllerFactory',
            'AdminPagamentoController' => 'AdminFactory\Pagamento\PagamentoControllerFactory',
            'AdminSiteController' => 'AdminFactory\Site\SiteControllerFactory',
            'AdminUsuariosController' => 'AdminFactory\Usuario\UsuarioControllerFactory'
        )
    )
);
