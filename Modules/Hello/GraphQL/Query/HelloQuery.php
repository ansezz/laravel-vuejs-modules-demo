<?php

namespace Modules\Hello\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use Modules\Hello\Entities\Hello;

class HelloQuery extends Query
{
    protected $attributes = [
        'name' => 'HelloQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Hello'));
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
        $hello = new Hello();

        if (isset($args['id'])) {
            $hello = $hello->where('id', $args['id']);
        }

        if (isset($args['email'])) {
            $hello = $hello->where('email', $args['email']);
        }

        if (isset($args['login'])) {
            $hello = $hello->where('login', $args['login']);
        }

        return $hello->get();
    }
}
