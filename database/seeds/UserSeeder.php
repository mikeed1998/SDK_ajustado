<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Sistema',
            'email' => 'system_managment@michcvdev.com',
            'password' => Hash::make('12345'), 
            'role_as' => 1, // Asignar un rol, por ejemplo 1 para admin, 0 para user
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Michael Eduardo Sandoval Pérez',
            'email' => 'mikeed1998@gmail.com',
            'password' => Hash::make('12345'), 
            'role_as' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
