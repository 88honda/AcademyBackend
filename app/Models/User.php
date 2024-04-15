<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Usertag;
use App\Models\Mentor;
use App\Models\Tag;
use App\Models\TimeSlot;
use App\Models\Reservation;


class User extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }
    public function usertags()
    {
        return $this->hasMany(Usertag::class);
    }
    public function timeslots()
    {
        return $this->hasMany(TimeSlot::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}