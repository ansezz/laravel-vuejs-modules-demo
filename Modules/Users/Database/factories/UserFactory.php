<?php

use Faker\Generator as Faker;

$factory->define(\Modules\User\Entities\User::class, function (Faker $faker) {
    return [
        'login' => $faker->userName,
        'email' => $faker->email,
        'password' => bcrypt('password'),
        'name' => $faker->name,
        'display_name' => $faker->name,
        'url' => $faker->url,
        'status' => $faker->randomElement([1, 0])
    ];
});
