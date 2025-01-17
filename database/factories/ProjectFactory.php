<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    // Carpeta para guardar imágenes finales
    $imagePath = public_path('images/fake/projects/');
    if (!file_exists($imagePath)) {
        mkdir($imagePath, 0755, true);
    }

    // Carpeta para imágenes temporales
    $tempDirectory = storage_path('app/temp');
    if (!file_exists($tempDirectory)) {
        mkdir($tempDirectory, 0755, true);
    }

    // Descargar una imagen temporal desde Unsplash
    $imageUrl = 'https://picsum.photos/640/480';
    // $imageUrls = [
    //     'https://images.unsplash.com/photo-1587806301027-896a175fa2c3',
    //     'https://images.unsplash.com/photo-1521295121783-8a321d551ad2',
    //     'https://images.unsplash.com/photo-1602524203247-f71f58c06614',
    // ];
    // $imageUrl = $faker->randomElement($imageUrls); // Seleccionar una URL al azar 

    $imageName = uniqid() . '.jpg'; // Generar un nombre único para la imagen
    $tempImagePath = $tempDirectory . '/' . $imageName;

    // Descargar y guardar la imagen
    file_put_contents($tempImagePath, file_get_contents($imageUrl));

    // Verificar si la imagen fue descargada correctamente
    if (!file_exists($tempImagePath)) {
        throw new Exception("Error al descargar la imagen desde Unsplash.");
    }

    // Mover la imagen descargada a la carpeta persistente
    $finalImagePath = $imagePath . $imageName;
    rename($tempImagePath, $finalImagePath);

    return [
        'title' => $faker->sentence,
        'slug' => $faker->slug,
        'description' => $faker->paragraph,
        'content' => $faker->text,
        'image' => 'images/fake/projects/' . $imageName, // Ruta accesible públicamente
        'demo_url' => $faker->url,
        'repo_url' => $faker->url,
        'client_url' => $faker->url,
        'client_name' => $faker->name,
        'client_email' => $faker->email,
        'start_date' => $faker->date(),
        'end_date' => $faker->date(),
        'is_featured' => $faker->boolean,
        'order' => $faker->randomNumber(),
        'category_id' => function () {
            return factory(Category::class)->create()->id; // Relación con Category
        },
    ];
});