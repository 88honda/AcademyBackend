<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserTags;
use App\Models\User;
use App\Models\Tag;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TimeSlot>
 */
// class UserTagFactory extends Factory
// {
//     /**
//      * Define the model's default state.
//      *
//      * @return array<string, mixed>
//      */
//     public function definition(): array
//     {
//         $users = User::all();
//         $tags = Tag::all();
//         return [
//             'user_id' => $users->random()->id,
//             'tag_id'  => $tags->random()->id,
//         ];
//     }
// }
