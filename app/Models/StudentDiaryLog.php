<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class StudentDiaryLog extends Model
{
	use HasFactory;
    public function users()
    {
        return $this->belongsTo(Student::class);
    }
}