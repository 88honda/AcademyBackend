<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TimeSlotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('time_slots')->insert([
            [
                'mentor_id'=> '1',
                'start_time'=> '2024-04-15 12:00:00',
                'end_time'=> '2024-04-15 19:00:00',
                'status'=> 'available',
            ],
            [
                'mentor_id'=> '2',
                'start_time'=> '2024-04-15 10:00:00',
                'end_time'=> '2024-04-15 21:00:00',
                'status'=> 'booked',
            ],            
            [
                'mentor_id'=> '3',
                'start_time'=> '2024-04-15 17:00:00',
                'end_time'=> '2024-04-15 21:00:00',
                'status'=> 'available',
            ]
        ]);
    }
};
