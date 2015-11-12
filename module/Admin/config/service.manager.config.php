<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'AdminAnunciosViewModel' => 'Admin\Anuncio\AnunciosViewModelFactory',
            'AdminCompraViewModel' => 'Admin\Compra\CompraViewModelFactory',
            'AdminModificarAnuncioViewModel' => 'Admin\Anuncio\ModificarAnuncioViewModelFactory',
            'AdminModificarUsuarioViewModel' => 'Admin\Usuario\ModificarUsuarioViewModelFactory',
            'AdminSiteViewModel' => 'Admin\Site\SiteViewModelFactory',
            'AdminUsuarioViewModel' => 'Admin\Usuario\UsuarioViewModelFactory',
            'AdminViewModel' => 'Admin\AdminViewModelFactory'
        )
    )
);
