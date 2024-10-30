<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Reservation;

class TimeSlot extends Model
{
    use HasFactory;
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }
}
