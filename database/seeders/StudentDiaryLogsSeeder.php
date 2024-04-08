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
        // $UserData = User::all();
        
        // foreach ($UserData as $UserData) {
        //     StudentDiaryLog::create([
        //         'student_id' => $UserData->id, // 他のモデルのIDを使って関連付ける
        //         'content'=>fake()->word(),
        //     ]);
        // }

        StudentDiaryLog::factory(15) -> create();
    }
}