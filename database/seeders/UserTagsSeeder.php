<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserTag;

class UserTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        UserTag::factory(5)->create();
    }
}
