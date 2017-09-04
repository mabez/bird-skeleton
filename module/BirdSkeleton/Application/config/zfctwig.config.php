<?php
return [
    'zfctwig' => [
        'extensions' => [
            'Twig_Extension_Debug'
        ],
        'environment_options' => [
            'debug' => true,
            'cache' => __DIR__ . '/../../../data/cache/twig',
        ],
    ]
];
