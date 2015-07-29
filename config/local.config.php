<?php

use Apitude\EntityServices\StampSubscriber;

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
            'mappings' => [
                [
                    'type' => 'annotation',
                    'namespace' => 'Apitude\Entities',
                    'path' => APP_PATH.'/vendor/apitude/apitude/src/Entities',
                    'use_simple_annotation_reader' => false,
                ],
                [
                    'type' => 'annotation',
                    'namespace' => 'Apitest\Entities',
                    'path' => APP_PATH.'/src/Entities',
                    'use_simple_annotation_reader' => false,
                ]
            ]
        ]
    ],
    'orm.subscribers' => [
        StampSubscriber::class,
    ],
    // Note that Migrations is NOT inside src.  This is because it does not and should not
    // contain any application logic, and therefore is separate from the application.
    'migrations.directory' => APP_PATH.'/Migrations',

    'service_providers' => [
        \Apitest\Provider\ApitestProvider::class => [],
        // add class names of other service providers you wish to register here
        // as keys, and configuration you wish to be passed to them as the value.
        // example : MyServiceProvider::class => ['configKey' => 37, ...]
    ],

    'commands' => [
        \Apitest\Commands\MakePerson::class,
    ]
];
