<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            TechnologiesSeeder::class,
            ProjectSeeder::class,
            ProjectImagesSeeder::class,
            ProjectTechnologiesSeeder::class,
        ]);
    }
}
