<?php

namespace Modules\User\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use Illuminate\Support\Facades\Auth;

class LoginQuery extends Query
{


    protected $repository;

    public function __construct()
    {
        parent::__construct();

    }

    protected $attributes = [
        'name' => 'LoginQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::string();
    }

    public function args()
    {
        return [
            'email' => [
                'name' => 'email',
                'type' => Type::string()
            ],
            'password' => [
                'name' => 'password',
                'type' => Type::string()
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {

        if (Auth::attempt(['email' => $args['email'], 'password' => $args['password']])) {
            $user = Auth::user();
            return $user->createToken('app')->accessToken;
        }
        //    return response()->json(['error'=>'Unauthorised'], 401);

        return '';
    }
}
