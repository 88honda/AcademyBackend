<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\TimeSlot;

class Reservation extends Model
{
    use HasFactory;
    public function timeslot()
    {
        return $this->belongsTo(TimeSlot::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
