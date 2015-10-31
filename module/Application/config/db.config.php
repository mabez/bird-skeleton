<?php
return array(
    'db' => array(
        'driver' => 'Pdo',
        'username' => 'bird_skeleton', // edit this
        'password' => 'bird_skeleton', // edit this
        'dsn' => 'mysql:dbname=bird_skeleton_beta1;host=localhost',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        )
    )
);
