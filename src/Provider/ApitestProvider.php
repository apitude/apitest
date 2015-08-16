<?php
namespace Apitest\Provider;


use Apitude\Core\Provider\AbstractServiceProvider;
use Silex\Application;
use Silex\ServiceProviderInterface;

class ApitestProvider extends AbstractServiceProvider implements ServiceProviderInterface
{
    public function __construct()
    {
        $this->entityFolders['Apitest\Entities'] = realpath(__DIR__.'/../Entities');
    }

    /**
     * Registers services on the given app.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     */
    public function register(Application $app)
    {
        parent::register($app);
    }

    /**
     * Bootstraps the application.
     *
     * This method is called after all services are registered
     * and should be used for "dynamic" configuration (whenever
     * a service must be requested).
     */
    public function boot(Application $app)
    {
    }
}
