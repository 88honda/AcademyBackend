<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Tag;
use App\Models\StudentDiaryLog;
use App\Models\TimeSlot;

class User extends Model
{
    use HasFactory;

    public function users()
    {
        return $this -> belongsToMany(Tag::class, 'user_tags');
        return $this -> hasMany(Student::class);
        return $this -> hasMany(StudentDiaryLog::class);
        return $this -> belongsTo(TimeSlot::class);
    }
}