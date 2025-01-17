<?php

use App\Project;
use App\ProjectTechnologies;
use App\Technologies;
use Illuminate\Database\Seeder;

class ProjectTechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = Project::all();
        $technologies = Technologies::all();

        $projects->each(function ($project) use ($technologies) {
            $technologies->random(3)->each(function ($technology) use ($project) {
                factory(ProjectTechnologies::class)->create([
                    'project_id' => $project->id,
                    'technology_id' => $technology->id
                ]);
            });
        });
    }
}
