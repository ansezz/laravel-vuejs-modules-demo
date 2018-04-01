<?php

namespace Modules\User\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use Modules\User\Entities\User;
use Modules\User\Repositories\UserRepository;

class UsersQuery extends Query
{


    protected $repository;

    public function __construct(UserRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }

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

        if (isset($args['id'])) {
            $this->repository->findByField('id', $args['id']);
        }

        if (isset($args['email'])) {
            $this->repository->findByField('email', $args['email']);
        }

        if (isset($args['login'])) {
            $this->repository->findByField('login', $args['login']);
        }

        return $this->repository->get();
    }
}
