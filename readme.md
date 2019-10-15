# i18n framework REST API hub

## How to setup hub

1. Setup DB config (`./config/db.php`)
    ```php
    'dsn' => 'mysql:host=localhost;dbname=i18n',
    'username' => 'i18n',
    'password' => 'Novem9bit',
    'charset' => 'utf8mb4',
    'tablePrefix' => 'i18n_'
    ```
2. Setup Rest component config (`./config/rest.php`)
    ```php
   'api_keys' => [
       'demo_key_123',
       'demo_key_321',
        ...
   ]
    ```
   
## How to setup client

Change your i18n module configuration Method component configuration.

```php
Module::instance(
[
    'translation' => [
        'class' => Translation::class,
        'method' => [
            'class' => RestMethod::class,
            'remote_host'=>'my.i18n-hub.com',
            'ssl'=>true,
            'api_key' => 'demo_key_123',
            'exclusions' => ['barev', 'barev duxov', "hayer", 'Hello'],
            'validation' => true,
            'save_translations' => true
        ],
    ],
    ...
]
```