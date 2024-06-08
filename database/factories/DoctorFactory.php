<?php

namespace Database\Factories;

use App\Models\Section;
use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'phone' => fake()->phoneNumber(),
            'section_id' => Section::all()->random()->id,
            'price' => fake()->randomElement([100,200,350,450,670,800]),
        ];
    }
}