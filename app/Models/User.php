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
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;

    public function student()
    {
        $users = User::with('students', 'mentors')->get();
        return $this->belongsTo(Student::class, 'id', 'student_id');
    }
    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }
    public function usertags()
    {
        return $this->hasMany(Usertag::class);
    }
    
}