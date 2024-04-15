<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // User::factory(3)->create();
        DB::table('users')->insert([
            [
                'id'=> '1',
                'name'=> '宇野 結衣',
                'email'=> 'aaa@gmail.com',
                'password'=> '1234567890',
                'role'=> 'student',
                'detail_id'=> 1,
            ],
            [
                'id'=> '2',
                'name'=> '宇野 結衣',
                'email'=> 'aaa@gmail.com',
                'password'=> '1234567890',
                'role'=> 'student',
                'detail_id'=> 2,
            ],
            [
                'id'=> '3',
                'name'=> '宇野 結衣',
                'email'=> 'aaa@gmail.com',
                'password'=> '1234567890',
                'role'=> 'mentor',
                'detail_id'=> 1,
            ]
        ]);
    }
}
