<?php

namespace Modules\Hello\Presenters;

use Modules\Hello\Transformers\HelloTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class HelloPresenter.
 *
 * @package namespace App\Presenters;
 */
class HelloPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new HelloTransformer();
    }
}
