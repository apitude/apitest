<?php
if (! file_exists('./vendor/autoload.php')) {
    throw new \RuntimeException('vendor/autoload not found.  Please run composer install');
}
require_once './vendor/autoload.php';

if (!defined('APP_ENV')) {
    define('APP_ENV', 'development');
}

if (!defined('APP_PATH')) {
    define('APP_PATH', realpath(__DIR__));
}

$bs = new \Apitude\Core\Bootstrap();
$app = $bs->createApplication();
//$app->register(new \Silex\Provider\SecurityServiceProvider);
//$app->register(new \Apitude\User\UserServiceProvider);

// add extra service providers here

$app->boot();
return $app;