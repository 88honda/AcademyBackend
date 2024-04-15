<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reservations')->insert([
            [
                'student_id'=> '1',
                'time_slot_id'=> '1',
            ],
            [
                'student_id'=> '2',
                'time_slot_id'=> '2',
            ],            [
                'student_id'=> '3',
                'time_slot_id'=> '3',
            ]
        ]);
    }
}