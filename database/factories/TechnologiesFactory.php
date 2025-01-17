<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Technologies;
use Faker\Generator as Faker;

$factory->define(Technologies::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'slug' => $faker->slug,
    ];
});