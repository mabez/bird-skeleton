<?php

return array(
    'modules' => array(
        'Application',
        'ZfcTwig'
    ),
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor',
        ),
        'config_glob_paths' => array(
            'config/autoload/{,*.}{global,local}.php',
        )
    ),
    'view_manager' => array(
        'strategies' => array('ZfcTwigViewStrategy')
    )
);
