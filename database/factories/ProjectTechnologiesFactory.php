<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProjectTechnologies;
use App\Project;
use App\Technologies;
use Faker\Generator as Faker;

$factory->define(ProjectTechnologies::class, function (Faker $faker) {
    return [
        'project_id' => function () {
            return factory(Project::class)->create()->id; // Relación con Project
        },
        'technology_id' => function () {
            return factory(Technologies::class)->create()->id; // Relación con Technology
        },
    ];
});