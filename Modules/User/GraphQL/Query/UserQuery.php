<?php

namespace Modules\User\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use Modules\User\Entities\User;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'UserQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('User'));
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string()
            ],
            'login' => [
                'name' => 'login',
                'type' => Type::string()
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $user = new User();

        if (isset($args['id'])) {
            $user = $user->where('id', $args['id']);
        }

        if (isset($args['email'])) {
            $user = $user->where('email', $args['email']);
        }

        if (isset($args['login'])) {
            $user = $user->where('login', $args['login']);
        }

        return $user->get();
    }
}
