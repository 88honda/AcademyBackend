<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            'mentor_id'=>\App\Models\User::factory(),
            'start_time'=>fake()->date(),
            'end_time'=>fake()->date(),
            'status'=>fake()->randomElement(['available', 'booked']),
        ];
    }
}
