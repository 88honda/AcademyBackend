<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Schema;


class UsersSeeder extends Seeder
{   
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints(); 
        User::query()->truncate();
        User::factory(15)->create();
        Schema::enableForeignKeyConstraints();
    }
}
