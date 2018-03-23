<?php

namespace Modules\User\Providers;

use GraphQL;
use Illuminate\Support\ServiceProvider;
use Modules\User\GraphQL\Mutation\CreateUserMutation;
use Modules\User\GraphQL\Query\UserQuery;
use Modules\User\GraphQL\Type\UserType;

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
        GraphQL::addType(UserType::class, 'User');

        GraphQL::addSchema('default', [
            'query' => [
                'user' => UserQuery::class
            ],
            'mutation' => [
                'createUser' => CreateUserMutation::class
            ]
        ]);
    }
}
