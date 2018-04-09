<?php

namespace Ansezz\Modules\Process;

use Ansezz\Modules\Contracts\RunableInterface;
use Ansezz\Modules\Repository;

class Runner implements RunableInterface
{
    /**
     * The module instance.
     *
     * @var \Ansezz\Modules\Repository
     */
    protected $module;

    /**
     * The constructor.
     *
     * @param \Ansezz\Modules\Repository $module
     */
    public function __construct(Repository $module)
    {
        $this->module = $module;
    }

    /**
     * Run the given command.
     *
     * @param string $command
     */
    public function run($command)
    {
        passthru($command);
    }
}
