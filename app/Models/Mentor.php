<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Mentor extends Model
{
    use HasFactory;
    protected $fillable = ['name','teaching_languages','experience_years','introduction'];

    public function user()
    {
        return $this->hasOne(User::class, 'detail_id');
    }
    public function timeslot()
    {
        return $this->hasMany(TimeSlot::class, 'mentor_id');
    }
}
