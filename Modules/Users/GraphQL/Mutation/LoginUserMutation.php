<?php

namespace Modules\User\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Modules\User\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use GraphQL;
use Modules\User\Transformers\UserTransformer;

class LoginUserMutation extends Mutation
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }


    protected $attributes = [
        'name' => 'LoginUserMutation',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return Type::string();
    }


    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function args()
    {
        return [
            'email' => ['name' => 'email', 'type' => Type::string()],
            'password' => ['name' => 'password', 'type' => Type::string()]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if (Auth::attempt(['email' => $args['email'], 'password' => $args['password']])) {
            $user = Auth::user();
            return $user->createToken('app')->accessToken;
        }
        //    return response()->json(['error'=>'Unauthorised'], 401);

        return null;
    }

}
