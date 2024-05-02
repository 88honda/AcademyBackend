<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\TimeSlot;
use App\Models\Reservation;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::all();
        $timeslots = TimeSlot::all();

        foreach($students as $student){
            foreach($timeslots as $timeslot){
                Reservation::create([
                    'student_id' => $student->id,
                    'time_slot_id' => $timeslot->id,
                ]);
            }
        }
    }
}