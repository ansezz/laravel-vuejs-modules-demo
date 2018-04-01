<?php

namespace Modules\Hello\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Hello;

/**
 * Class HelloTransformer.
 *
 * @package namespace App\Transformers;
 */
class HelloTransformer extends TransformerAbstract
{
    /**
     * Transform the Hello entity.
     *
     * @param \App\Entities\Hello $model
     *
     * @return array
     */
    public function transform(Hello $model)
    {
        return [
            'id' => (int)$model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
