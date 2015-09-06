<?php
namespace Apitest\Provider;


use Apitest\Controller\Controller\PersonController;
use Apitude\Core\Provider\AbstractServiceProvider;
use Silex\Application;
use Silex\ServiceProviderInterface;

class ApitestProvider extends AbstractServiceProvider implements ServiceProviderInterface
{
    protected $services = [
        PersonController::class,
    ];

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

        $app->get('/people', PersonController::class.':readList');

        $app->get('/people({id})', PersonController::class.':read')
            ->assert('id', '\d+');

        $app->post('/people', PersonController::class.':create');

        $app->patch('/people({id})', PersonController::class.':update')
            ->assert('id', '\d+');

        $app->delete('/people({id})', PersonController::class.':delete')
            ->assert('id', '\d+');
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
