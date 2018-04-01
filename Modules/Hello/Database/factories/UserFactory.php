<?php

use Faker\Generator as Faker;

$factory->define(\Modules\Hello\Entities\Hello::class, function (Faker $faker) {
    return [
        'login' => $faker->helloName,
        'email' => $faker->email,
        'password' => $faker->password,
        'name' => $faker->name,
        'display_name' => $faker->name,
        'url' => $faker->url,
        'status' => $faker->randomElement([1, 0])
    ];
});
