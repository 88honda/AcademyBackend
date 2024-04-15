<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mentor;

class MentorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mentor::factory(5)->create();
    }
}
