<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(MentorsSeeder::class);
        $this->call(StudentsSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(UserTagsSeeder::class);
        $this->call(StudentDiarylogsSeeder::class);
        $this->call(TimeSlotsSeeder::class);
        $this->call(ReservationsSeeder::class);
    }
}
