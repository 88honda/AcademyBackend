<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\StudentDiarylog;


class StudentDiaryLogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        StudentDiaryLog::factory(15)->create();
    }
}