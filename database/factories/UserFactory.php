<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\Mentor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TimeSlot>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        $studentIds = Student::pluck('id');
        $mentorIds = Mentor::pluck('id');

        $studentCount = $studentIds->count();
        $studentPercentage = 0.5; 
        $studentIdsSubset = $studentIds->random(intval($studentCount * $studentPercentage));

        $mentorCount = $mentorIds->count();
        $mentorPercentage = 0.5; 
        $mentorSubset = $mentorIds->random(intval($mentorCount * $mentorPercentage));

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'role' => fake()->randomElement(['student', 'mentor']),
            'detail_id' => function (array $attributes) use ($studentIdsSubset, $mentorSubset) {
                if ($attributes['role'] === 'student') {
                    return fake()->randomElement($studentIdsSubset);
                } 
            else {
                    return fake()->randomElement($mentorSubset);
                }
            },
            
            // fake()->randomElement([$studentIdsSubset, $mentorSubset]),
            // 'detail_id' => $students->random()->id,
        ];
    }
}
