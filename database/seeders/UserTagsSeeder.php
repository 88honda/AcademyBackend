<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserTag;
use Illuminate\Support\Facades\Schema;


class UserTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints(); 
        UserTag::query()->truncate();
        UserTag::factory(15)->create();
        Schema::enableForeignKeyConstraints();
    }
}
