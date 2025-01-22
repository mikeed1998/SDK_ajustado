<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seccions')->insert([
            'seccion' => 'Configuracion',
            'portada' => 'bi bi-gear-fill',
            'slug' => 'configuracion',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('seccions')->insert([
            'seccion' => 'Politicas',
            'portada' => 'bi bi-shield-fill-exclamation',
            'slug' => 'politicas',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('seccions')->insert([
            'seccion' => 'Preguntas Frecuentes',
            'portada' => 'bi bi-question-circle-fill',
            'slug' => 'faqs',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('seccions')->insert([
            'seccion' => 'Página Principal',
            'portada' => 'bi bi-house-door-fill',
            'slug' => 'home',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('seccions')->insert([
            'seccion' => 'Sobre Mi',
            'portada' => 'bi bi-postcard-fill',
            'slug' => 'nosotros',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('seccions')->insert([
            'seccion' => 'Contacto',
            'portada' => 'bi bi-send-fill',
            'slug' => 'contacto',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('seccions')->insert([
            'seccion' => 'Portafolio',
            'portada' => 'bi bi-stack',
            'slug' => 'portafolio',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('seccions')->insert([
            'seccion' => 'Experiencia Profesional',
            'portada' => 'bi bi-card-image',
            'slug' => 'experiencia',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('seccions')->insert([
            'seccion' => 'Mi CV',
            'portada' => 'bi bi-layout-text-window-reverse',
            'slug' => 'mycv',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('seccions')->insert([
            'seccion' => 'Blog',
            'portada' => 'bi bi-camera-fill',
            'slug' => 'blog',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
