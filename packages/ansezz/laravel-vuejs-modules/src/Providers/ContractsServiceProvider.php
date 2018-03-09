<?php

namespace Ansezz\Modules\Providers;

use Illuminate\Support\ServiceProvider;
use Ansezz\Modules\Contracts\RepositoryInterface;
use Ansezz\Modules\Laravel\Repository;

class ContractsServiceProvider extends ServiceProvider
{
    /**
     * Register some binding.
     */
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, Repository::class);
    }
}
