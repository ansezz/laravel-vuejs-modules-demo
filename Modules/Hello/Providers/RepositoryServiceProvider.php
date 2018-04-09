<?php

namespace Modules\Hello\Providers;


use Illuminate\Support\ServiceProvider;
use Modules\Hello\Repositories\HelloRepository;
use Modules\Hello\Repositories\HelloRepositoryEloquent;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(HelloRepository::class, HelloRepositoryEloquent::class);
        //:end-bindings:
    }
}
