<?php

namespace Modules\User\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use Illuminate\Support\Facades\Auth;

class ProfileQuery extends Query
{

    protected $attributes = [
        'name' => 'ProfileQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return GraphQL::type('User');
    }


    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        return Auth::user();
    }
}
