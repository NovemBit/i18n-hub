<?php

use NovemBit\i18n\system\component\DB;

return  [
    'class' => DB::class,
    'connection' => [
        'dsn' => 'mysql:host=localhost;dbname=i18n',
        'username' => 'i18n',
        'password' => 'Novem9bit',
        'charset' => 'utf8mb4',
        'tablePrefix' => 'i18n_',
        /*'enableQueryCache' => true,
        'enableSchemaCache' => true,
        'schemaCacheDuration' => 3000,
        'schemaCache' => 'cache',*/
    ],
];