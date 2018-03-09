<?php

namespace Ansezz\Modules\Tests;

use Ansezz\Modules\Laravel\Repository;

class LaravelVuejsModulesServiceProviderTest extends BaseTestCase
{
    /** @test */
    public function it_binds_modules_key_to_repository_class()
    {
        $this->assertInstanceOf(Repository::class, app('modules'));
    }
}
