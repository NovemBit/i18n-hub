<?php

use NovemBit\i18n\system\component\DB;

return  [
    'class' => DB::class,
    'connection' => [
        'dsn' => 'mysql:host=localhost;dbname=MY_DATABASE_NAME',
        'username' => 'MY_DATABASE_USERNAME',
        'password' => 'MY_DATABASE_PASSWORD',
        'charset' => 'utf8mb4',
        'tablePrefix' => 'i18n_',
        /*'enableQueryCache' => true,
        'enableSchemaCache' => true,
        'schemaCacheDuration' => 3000,
        'schemaCache' => 'cache',*/
    ],
];