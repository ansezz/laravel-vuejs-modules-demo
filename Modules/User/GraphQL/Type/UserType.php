<?php

namespace Modules\User\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;
use Modules\User\Entities\User;

class UserType extends BaseType
{
    protected $attributes = [
        'name' => 'Users',
        'description' => 'A type',
        'model' => User::class, // define model for users type
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of user'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of the user'
            ],
            'display_name' => [
                'type' => Type::string(),
                'description' => 'The display Name of the user'
            ],
            'url' => [
                'type' => Type::string(),
                'description' => 'The url of the user'
            ],
            'status' => [
                'type' => Type::int(),
                'description' => 'The status of the user'
            ]
        ];
    }
}
