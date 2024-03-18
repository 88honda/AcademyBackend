<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mentor>
 */
class MentorFactory extends Factory
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
            'teaching_languages'=>fake()->randomElement(['PHP', 'JavaScript', 'Python', 'GO', 'Kotlin', 'Java', 'Swift', 'Ruby', 'C#', 'C++']),
            'experience_years'=>fake()->randomElement([1,2,3,4,5,6,7,8,9,10,11,12]), 
            'introduction'=>fake()->text(),
        ];
    }
}
