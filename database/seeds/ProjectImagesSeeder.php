<?php

use App\Project;
use App\ProjectImages;
use Illuminate\Database\Seeder;

class ProjectImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = Project::all();
        $projects->each(function ($project) {
            factory(ProjectImages::class, 3)->create([
                'project_id' => $project->id
            ]);
        });
    }
}
