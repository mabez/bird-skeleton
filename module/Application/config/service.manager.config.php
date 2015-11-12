<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'AnunciosViewModel' => 'Application\Anuncio\AnunciosViewModelFactory',
            'SiteViewModel' => 'Application\Site\SiteViewModelFactory',
        )
    )
);
