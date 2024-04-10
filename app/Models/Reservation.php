<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\TimeSlot;

class Reservation extends Model
{
    use HasFactory;
    public function timeslot()
    {
        return $this->belongsTo(TimeSlot::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
