<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Usertag;
use App\Models\Mentor;


class User extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','password','role'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'detail_id');
    }
    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'detail_id');
    }
    public function usertags()
    {
        return $this->hasMany(Usertag::class);
    }    
}