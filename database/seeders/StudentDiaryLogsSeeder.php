<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentDiarylog;
use Illuminate\Support\Facades\Schema;


class StudentDiaryLogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints(); 
        StudentDiarylog::query()->truncate();
        StudentDiarylog::factory(15)->create();
        Schema::enableForeignKeyConstraints();
    }
}