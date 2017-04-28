<?php
namespace AdminFactory;

return [
    'service_manager' => [
        'factories' => [
            'AdminProdutosViewModel' => \AdminFactory\Produto\ViewModel::class,
            'AdminCompraViewModel' => \AdminFactory\Compra\ViewModel::class,
            'AdminModificarProdutoViewModel' => \AdminFactory\Produto\ModificarViewModel::class,
            'AdminModificarUsuarioViewModel' => \AdminFactory\Usuario\ModificarViewModel::class,
            'AdminPagamentoViewModel' => \AdminFactory\Pagamento\ViewModel::class,
            'AdminSiteViewModel' => \AdminFactory\Site\ViewModel::class,
            'AdminUsuarioViewModel' => \AdminFactory\Usuario\ViewModel::class,
            'AdminViewModel' => ViewModel::class
        ]
    ]
];
