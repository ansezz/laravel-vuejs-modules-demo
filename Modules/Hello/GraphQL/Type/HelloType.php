<?php

namespace Modules\Hello\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;
use Modules\Hello\Entities\Hello;

class HelloType extends BaseType
{
    protected $attributes = [
        'name' => 'Hellos',
        'description' => 'A type',
        'model' => Hello::class, // define model for hellos type
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the hello'
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of hello'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of the hello'
            ],
            'display_name' => [
                'type' => Type::string(),
                'description' => 'The display Name of the hello'
            ],
            'url' => [
                'type' => Type::string(),
                'description' => 'The url of the hello'
            ],
            'status' => [
                'type' => Type::int(),
                'description' => 'The status of the hello'
            ]
        ];
    }
}
