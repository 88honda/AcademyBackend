<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\StudentDiaryLog;
use App\Models\Reservation;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name','learning_language','experience_level'];
    public function user()
    {
        return $this->hasOne(User::class, 'detail_id');
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function studentdiarylogs()
    {
        return $this->hasMany(StudentDiaryLog::class);
    }
}