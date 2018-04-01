<?php

namespace Modules\Hello\Providers;

use GraphQL;
use Illuminate\Support\ServiceProvider;
use Modules\Hello\GraphQL\Mutation\CreateHelloMutation;
use Modules\Hello\GraphQL\Query\HelloQuery;
use Modules\Hello\GraphQL\Type\HelloType;

class GraphQLServiceProvider extends ServiceProvider
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
        GraphQL::addType(HelloType::class, 'Hello');

        GraphQL::addSchema('default', [
            'query' => [
                'hello' => HelloQuery::class
            ],
            'mutation' => [
                'createHello' => CreateHelloMutation::class
            ]
        ]);
    }
}
