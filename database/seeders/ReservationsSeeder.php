<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;
use Illuminate\Support\Facades\Schema;


class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints(); 
        Reservation::query()->truncate();
        Reservation::factory(15)->create();
        Schema::enableForeignKeyConstraints();
    }
}