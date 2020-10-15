<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Manufactor;
use Faker\Generator as Faker;

$factory->define(Manufactor::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
    ];
});
