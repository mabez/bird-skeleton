<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'AnunciosViewModel' => 'Application\Anuncio\AnunciosViewModelFactory',
            'LoginViewModel' => 'Application\Login\LoginViewModelFactory',
            'SiteViewModel' => 'Application\Site\SiteViewModelFactory'
        )
    )
);
