<?php

namespace Ansezz\Modules\Lumen;

use Ansezz\Modules\Json;
use Ansezz\Modules\Repository as BaseRepository;

class Repository extends BaseRepository
{
    /**
     * {@inheritdoc}
     */
    protected function createModule(...$args)
    {
        return new Module(...$args);
    }
}
