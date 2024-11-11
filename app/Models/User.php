<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Usertag;
use App\Models\Mentor;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['name','email','password','role','detail_id'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'detail_id', 'id');
    }
    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'detail_id', 'id');
    }
    public function usertags()
    {
        return $this->hasMany(Usertag::class);
    }    
}