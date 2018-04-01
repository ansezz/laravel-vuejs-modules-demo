<?php

namespace Modules\User\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class CreateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CreateUserMutation',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('User');
    }


    public function rules()
    {
        return [
            'email' => 'required|email|unique:users',
            'name' => 'required|min:2',
            'password' => 'required|min:6'
        ];
    }

    public function args()
    {
        return [
            'name' => ['name' => 'name', 'type' => Type::string()],
            'email' => ['name' => 'email', 'type' => Type::string()],
            'password' => ['name' => 'password', 'type' => Type::string()]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        return User::create($args);
    }

}
