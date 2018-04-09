<?php

namespace Modules\User\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use Modules\User\Repositories\UserRepository;

class CreateUserMutation extends Mutation
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }


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
            'display_name' => 'required|min:2',
            'login' => 'required|min:2',
            'password' => 'required|min:6'
        ];
    }

    public function args()
    {
        return [
            'name' => ['name' => 'name', 'type' => Type::string()],
            'email' => ['name' => 'email', 'type' => Type::string()],
            'login' => ['name' => 'login', 'type' => Type::string()],
            'display_name' => ['name' => 'display_name', 'type' => Type::string()],
            'password' => ['name' => 'password', 'type' => Type::string()]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        return $this->repository->create($args);
    }

}
