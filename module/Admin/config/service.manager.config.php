<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'AdminViewModel' => 'Admin\AdminViewModelFactory',
            'AdminAnunciosViewModel' => 'Admin\Anuncio\AnunciosViewModelFactory',
            'AdminModificarAnuncioViewModel' => 'Admin\Anuncio\ModificarAnuncioViewModelFactory',
            'AdminSiteViewModel' => 'Admin\Site\SiteViewModelFactory',
        )
    )
);
