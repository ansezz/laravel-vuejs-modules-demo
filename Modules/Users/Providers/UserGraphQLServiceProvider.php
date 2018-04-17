<?php

namespace Modules\User\Providers;

use GraphQL;
use Illuminate\Support\ServiceProvider;
use Modules\User\GraphQL\Mutation\CreateUserMutation;
use Modules\User\GraphQL\Mutation\LoginUserMutation;
use Modules\User\GraphQL\Query\ProfileQuery;
use Modules\User\GraphQL\Query\UsersQuery;
use Modules\User\GraphQL\Type\UserType;

class UserGraphQLServiceProvider extends ServiceProvider
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

        GraphQL::addSchema('auth', [
            'query' => [
                'profile' => ProfileQuery::class,
                'users' => UsersQuery::class,
            ],
            'mutation' => [
                'createUser' => CreateUserMutation::class
            ]
        ]);

        GraphQL::addSchema('default', [
            'query' => [
            ],
            'mutation' => [
                'loginUser' => LoginUserMutation::class,
            ]
        ]);
    }
}
