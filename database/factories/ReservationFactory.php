<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\TimeSlot;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $students = Student::all();
        $timeslots = TimeSlot::all();
        return [
            'student_id' => $students->random()->id,
            'time_slot_id' => $timeslots->random()->id,
        ];
    }
}
