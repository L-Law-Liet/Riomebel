<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Color;
use App\Product;
use App\Manufactor;
use App\Size;
use App\SubCategory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    $images = [
        $faker->imageUrl($width = 600, $height = 400),
        $faker->imageUrl($width = 600, $height = 400),
        $faker->imageUrl($width = 600, $height = 400),
        $faker->imageUrl($width = 600, $height = 400)
    ];
    $name = Str::random(10);
    $new_price = random_int(20000, 150000);
    return [
        'name' => $name,
        'discount' => $faker->randomFloat(2, 0, 50),
        'new_price' => $new_price,
        'old_price' => random_int(20000, 150000),
        'description' => $faker->realText(),
        'articule' => $faker->postcode,
        'image' => $faker->imageUrl(),
        'images' => json_encode($images),
        'slug' => Str::slug($name.' '.$new_price),
        'quantity' => random_int(1, 30),
        'manufactor_id' => Manufactor::inRandomOrder()->first()->id,
        'subcategory_id' => SubCategory::inRandomOrder()->first()->id,
        'color_id' => Color::inRandomOrder()->first()->id,
        'size_id' => Size::inRandomOrder()->first()->id,
    ];
});
