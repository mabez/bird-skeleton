<?php

return array(
    'service_manager' => array(
        'invokables' => array(
            'AnuncioManager' => 'Anuncio\AnuncioManager',
        ),
        'factories' => array(
            'AnuncioRepository' => 'Anuncio\AnuncioRepositoryFactory'
        )
    )
);