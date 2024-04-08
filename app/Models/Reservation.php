<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\TimeSlot;

class Reservation extends Model
{
    use HasFactory;
    public function Users()
    {
        return $this -> belongsTo(User::class);
        return $this -> belongsTo(TimeSlot::class);
    }
}
