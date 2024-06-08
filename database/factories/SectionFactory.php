<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{

    
    public function definition(): array
    {
        return [
            "name" => fake()->unique()->randomElement(['قسم الجراحة', 'قسم الأشعة', 'قسم العيون', 'قسم المختبر', 'قسم الباطنة', 'قسم العظام', 'قسم المخ و الأعصاب']),
            "description"=>fake()->paragraph(),
        ];
    
    }
}