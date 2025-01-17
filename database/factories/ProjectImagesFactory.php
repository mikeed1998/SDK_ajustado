<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProjectImages;
use App\Project;
use Faker\Generator as Faker;

$factory->define(ProjectImages::class, function (Faker $faker) {
    return [
        'image_url' => $faker->imageUrl(),
        'project_id' => function () {
            return factory(Project::class)->create()->id; // Relación con Project
        },
    ];
});