<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TimeSlot;
use Illuminate\Support\Facades\Schema;


class TimeSlotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints(); 
        TimeSlot::query()->truncate();
        TimeSlot::factory(15)->create();
        Schema::enableForeignKeyConstraints();
    }
}
