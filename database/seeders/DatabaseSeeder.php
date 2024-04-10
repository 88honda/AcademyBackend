<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */


    public function run()
    {
        $this->call(StudentsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(StudentDiaryLogsSeeder::class);
        $this->call(UserTagsSeeder::class);
        $this->call(ReservationsSeeder::class);
    }
}
