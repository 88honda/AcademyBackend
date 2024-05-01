<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mentor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TimeSlot>
 */
class TimeSlotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $mentors = Mentor::all();
        return [
            'mentor_id'  => $mentors->random()->id,
            'start_time' => fake()->date(),
            'end_time'   => fake()->date(),
            'status'     => fake()->randomElement(['available', 'booked',]),
        ];
    }
}
