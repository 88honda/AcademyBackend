<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StudentDiaryLogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('student_diary_logs')->insert([
            [
                'student_id'=> '1',
                'content'=> 'xxxxxxxxxxxxxx',
            ],
            [
                'student_id'=> '2',
                'content'=> 'xxxxxxxxxxxxxx',
            ],
            [
                'student_id'=> '3',
                'content'=> 'xxxxxxxxxxxxxx',
            ],
            [
                'student_id'=> '4',
                'content'=> 'xxxxxxxxxxxxxx',
            ],
            [
                'student_id'=> '5',
                'content'=> 'xxxxxxxxxxxxxx',
            ]]);
    }
}