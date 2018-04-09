<?php

namespace Ansezz\Modules\Tests;

use Ansezz\Modules\Contracts\RepositoryInterface;
use Ansezz\Modules\Laravel\Repository;

class ContractsServiceProviderTest extends BaseTestCase
{
    /** @test */
    public function it_binds_repository_interface_with_implementation()
    {
        $this->assertInstanceOf(Repository::class, app(RepositoryInterface::class));
    }
}
