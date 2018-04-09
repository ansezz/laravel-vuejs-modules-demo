<?php

namespace Ansezz\Modules;

use Ansezz\Modules\Support\Stub;

class LaravelVuejsModulesServiceProvider extends ModulesServiceProvider
{
    /**
     * Booting the package.
     */
    public function boot()
    {
        $this->registerNamespaces();
        $this->registerModules();
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->registerServices();
        $this->setupStubPath();
        $this->registerProviders();
    }

    /**
     * Setup stub path.
     */
    public function setupStubPath()
    {
        Stub::setBasePath(__DIR__ . '/Commands/stubs');

        $this->app->booted(function ($app) {
            if ($app['modules']->config('stubs.enabled') === true) {
                Stub::setBasePath($app['modules']->config('stubs.path'));
            }
        });
    }

    /**
     * {@inheritdoc}
     */
    protected function registerServices()
    {
        $this->app->singleton('modules', function ($app) {
            $path = $app['config']->get('modules.paths.modules');

            return new \Ansezz\Modules\Laravel\Repository($app, $path);
        });
    }
}
