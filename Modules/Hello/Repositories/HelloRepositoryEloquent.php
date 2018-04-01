<?php

namespace Modules\Hello\Repositories;

use Modules\Hello\Validators\HelloValidator;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Modules\Hello\Entities\Hello;

/**
 * Class HelloRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class HelloRepositoryEloquent extends BaseRepository implements HelloRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Hello::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return HelloValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
