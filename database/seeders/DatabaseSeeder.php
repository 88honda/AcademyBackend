<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */


    public function run()
    {
        // $this -> call(StudentDiaryLogsSeeder::class);
        // $this -> call(ReservationsSeeder::class);
        // $this -> call(UserTagsSeeder::class);
        $this -> call(StudentDiaryLogsSeeder::class);
        $this -> call(ReservationsSeeder::class);
        $this -> call(UserTagsSeeder::class);
        
    }
}
