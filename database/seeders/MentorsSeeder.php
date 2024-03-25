<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mentor;
use Illuminate\Support\Facades\Schema;


class MentorsSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints(); 
        Mentor::query()->truncate();
        Mentor::factory(15)->create();
        Schema::enableForeignKeyConstraints();
    }
}
