<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentDiaryLog;
use App\Models\Student;


class StudentDiaryLogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $students = Student::all();
        foreach($students as $student){
            StudentDiaryLog::factory()->create([
                'student_id' => $student->id,
            ]);
        }
    }
}