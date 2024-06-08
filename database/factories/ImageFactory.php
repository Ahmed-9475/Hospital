<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{

    
    public function definition(): array
    {
        return [
            // filename	imageable_id	imageable_type

            // 'filename' => fake()->randomElement(['1.jpg','2.png','3jpg', '4.jpg']),
            // 'imageable_id' => Doctor::all()->random()->id,
            // 'imageable_type' =>  'App\Models\Doctor' ,
        ];
    }           

}