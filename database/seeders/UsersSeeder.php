<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Mentor;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $students = Student::all();
        $mentors = Mentor::all();
        foreach($students as $student){
            User::factory()->create([
                'role' => 'student', 
                'detail_id' => $student->id,
            ]);
        }
        foreach($mentors as $mentor){
            User::factory()->create([
                'role' => 'mentor', 
                'detail_id' => $mentor->id,
            ]);
        }
    }
}
