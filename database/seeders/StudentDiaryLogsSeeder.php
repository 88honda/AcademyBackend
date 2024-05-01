<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentDiaryLog;


class StudentDiaryLogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        StudentDiaryLog::factory(10)->create();
    }
}