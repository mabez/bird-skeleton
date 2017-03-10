<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'AdminProdutosViewModel' => 'AdminFactory\Produto\ProdutosViewModelFactory',
            'AdminCompraViewModel' => 'AdminFactory\Compra\CompraViewModelFactory',
            'AdminModificarProdutoViewModel' => 'AdminFactory\Produto\ModificarProdutoViewModelFactory',
            'AdminModificarUsuarioViewModel' => 'AdminFactory\Usuario\ModificarUsuarioViewModelFactory',
            'AdminPagamentoViewModel' => 'AdminFactory\Pagamento\PagamentoViewModelFactory',
            'AdminSiteViewModel' => 'AdminFactory\Site\SiteViewModelFactory',
            'AdminUsuarioViewModel' => 'AdminFactory\Usuario\UsuarioViewModelFactory',
            'AdminViewModel' => 'AdminFactory\AdminViewModelFactory'
        )
    )
);
