<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'learning_language'=>fake()->randomElement(['PHP', 'JavaScript', 'Python', 'GO', 'Kotlin', 'Java', 'Swift', 'Ruby', 'C#', 'C++']),
            'experience_level'=>fake()->randomElement(['beginner', 'intermediate', 'advanced']),
        ];
    }
}
