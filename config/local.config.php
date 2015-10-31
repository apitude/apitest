<?php

return [
    'configuration.services' => [
        // [class => config]
    ],
    // Database connection options
    'db.options' => [
        'driver' => 'pdo_mysql',
        'dbname' => 'apitest',
        'user' => 'root',
        'password' => 'root',
        'host' => '127.0.0.1',
    ],
    'orm.options' => [
        'orm.proxies_dir' => APP_PATH.'/tmp/proxies',
        'orm.em.options' => [
            'connection' => 'default',
            'mappings' => []
        ]
    ],
    'orm.subscribers' => [],

    // Note that Migrations is NOT inside src.  This is because it does not and should not
    // contain any application logic, and therefore is separate from the application.
    'migrations.directory' => APP_PATH.'/Migrations',

    'service_providers' => [
        \Apitest\Provider\ApitestProvider::class => [],
        \Apitude\User\UserServiceProvider::class => [],
        \Apitude\User\OAuth\OAuth2ServiceProvider::class => [],
        // add class names of other service providers you wish to register here
        // as keys, and configuration you wish to be passed to them as the value.
        // example : MyServiceProvider::class => ['configKey' => 37, ...]
    ],

    'commands' => [
    ],

    'cache.driver' => 'array', // or preferably xcache if you have it installed as it keeps metadata in-memory
    // You may include a cache.redis array including "host" and "port" if you do not wish to use the default redis
    // configuration
    'redis' => [
        'host' => '127.0.0.1',
        'port' => 6379
    ],

    'qless' => [
        'host' => '127.0.0.1',
        'port' => 6379
    ],

    'email' => [
        'sender' => \Apitude\Core\Email\Service\SimpleSender::class,
    ],
];
