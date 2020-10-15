<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Size;
use Faker\Generator as Faker;

$factory->define(Size::class, function (Faker $faker) {
    return [
        'name' => random_int(1, 4).','.random_int(0, 9).'m'.' x '.random_int(1, 9).','.random_int(0, 9).'m'.' x '.random_int(1, 9).','.random_int(0, 9).'m'
    ];
});
