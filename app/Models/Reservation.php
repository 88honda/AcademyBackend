<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\TimeSlot;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;

    public function timeslot()
    {
        return $this->belongsTo(TimeSlot::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
