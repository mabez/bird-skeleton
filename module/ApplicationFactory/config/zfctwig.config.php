<?php
return array(
    'zfctwig' => array(
        'extensions' => array(
            'Twig_Extension_Debug'
        ),
        'environment_options' => array(
            'debug' => true,
            'cache' => __DIR__ . '/../../../data/cache/twig',
        ),
//         'helper_manager' => array(
//             'factories' => array(
//                 'SiteDefault' => 'ApplicationFactory\Site\SiteDefaultViewHelperFactory'
//             )
//         )
    )
);
