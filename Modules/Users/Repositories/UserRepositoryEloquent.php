<?php

namespace Modules\User\Repositories;

use Modules\User\Validators\UserValidator;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Modules\User\Entities\User;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return UserValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
