<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProjectImages;
use App\Project;
use Faker\Generator as Faker;

$factory->define(ProjectImages::class, function (Faker $faker) {

     $imagePath = public_path('images/fake/projects/gallery/');
     if (!file_exists($imagePath)) {
         mkdir($imagePath, 0755, true);
     }
 
     $tempDirectory = storage_path('app/temp');
     if (!file_exists($tempDirectory)) {
         mkdir($tempDirectory, 0755, true);
     }
 
     $imageUrls = [
         'https://fastly.picsum.photos/id/845/640/480.jpg?hmac=ynWITPuymThDjdvmWfkm4ZKd8k1HycB1FXR3An3_xks',
         'https://fastly.picsum.photos/id/667/845/640.jpg?hmac=tjCxlaCg0dmYTcmPN4DEMz6dVi1Z_1C2NZPSjpB7mGs',
         'https://fastly.picsum.photos/id/971/640/480.jpg?hmac=HkrHxcGz132TZNePlrxMTZ88htjxzvTs2Cj77jhpc1I',
     ];
     $imageUrl = $faker->randomElement($imageUrls); // Seleccionar una URL al azar 
 
     $imageName = uniqid() . '.jpg'; 
     $tempImagePath = $tempDirectory . '/' . $imageName;
 
     file_put_contents($tempImagePath, file_get_contents($imageUrl));
 
     if (!file_exists($tempImagePath)) {
         throw new Exception("Error al descargar la imagen desde Unsplash.");
     }
 
     $finalImagePath = $imagePath . $imageName;
     rename($tempImagePath, $finalImagePath);

    return [
        'image_url' => 'images/fake/projects/gallery/' . $imageName,
        'project_id' => function () {
            return factory(Project::class)->create()->id; // Relación con Project
        },
    ];
});