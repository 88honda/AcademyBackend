<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TimeSlot;
use App\Models\Mentor;


class TimeSlotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mentors = Mentor::all();

        foreach($mentors as $mentor){
            TimeSlot::factory()->create([
                'mentor_id' => $mentor->id,
            ]);
        }
    }
}
