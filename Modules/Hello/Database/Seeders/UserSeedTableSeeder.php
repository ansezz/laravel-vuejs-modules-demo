<?php

namespace Modules\Hello\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Hello\Entities\Hello;

class HelloSeedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(Hello::class, 10)->create();
    }
}
