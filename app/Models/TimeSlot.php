<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Reservation;

class TimeSlot extends Model
{
    use HasFactory;
    public function user()
    {
        return $this -> hasMany(Reservation::class);
        return $this -> belongsTo(User::class);
    }
}
