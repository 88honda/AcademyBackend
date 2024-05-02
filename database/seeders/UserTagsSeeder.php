<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserTag;
use App\Models\User;
use App\Models\Tag;

class UserTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = User::all();
        $tags = Tag::all();
        foreach($users as $user){
            foreach($tags as $tag){
                UserTag::create([
                    'user_id' => $user->id,
                    'tag_id' => $tag->id,
                ]);
            }
        }
    }
}
