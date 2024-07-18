<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use App\Models\Mentor;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function add(UserRequest $request){

        $users = new User();
        $students = new Student();
        $mentors = new Mentor();

        if ($request['role'] == '1') {
            $students->name = $request['name'];            
            $students->learning_language = $request['learning_language'];
            $students->experience_level = $request['experience_level'];
            $students->save();
            $users->name = $request['name'];
            $users->email = $request['email'];
            $users->password = Hash::make($request['password']);
            $users->role = "student";
            $users->detail_id = $students->id;
            $users->save();

        } elseif ($request['role'] == '2') {
            $mentors->name = $request['name'];  
            $mentors->teaching_languages = $request['teaching_languages'];
            $mentors->experience_years = $request['experience_years'];
            $mentors->introduction = "hogehoge";
            $mentors->save();
            $users->name = $request['name'];
            $users->email = $request['email'];
            $users->password = Hash::make($request['password']);
            $users->role = "mentor";
            $users->detail_id = $mentors->id;
            $users->save();
        };

        return redirect('/sign-in')->with('message', '追加しました');
    }  

}
