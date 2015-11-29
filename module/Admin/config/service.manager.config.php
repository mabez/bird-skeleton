<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'AdminProdutosViewModel' => 'Admin\Produto\ProdutosViewModelFactory',
            'AdminCompraViewModel' => 'Admin\Compra\CompraViewModelFactory',
            'AdminModificarProdutoViewModel' => 'Admin\Produto\ModificarProdutoViewModelFactory',
            'AdminModificarUsuarioViewModel' => 'Admin\Usuario\ModificarUsuarioViewModelFactory',
            'AdminPagamentoViewModel' => 'Admin\Pagamento\PagamentoViewModelFactory',
            'AdminSiteViewModel' => 'Admin\Site\SiteViewModelFactory',
            'AdminUsuarioViewModel' => 'Admin\Usuario\UsuarioViewModelFactory',
            'AdminViewModel' => 'Admin\AdminViewModelFactory'
        )
    )
);
