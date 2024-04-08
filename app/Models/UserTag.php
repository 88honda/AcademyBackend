<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tag;

class UserTag extends Model
{
    use HasFactory;
    public function usertags()
    {
        return $this -> belongsTo(User::class);
        return $this -> belongsTo(Tag::class);
    }
}
