<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use App\Models\Mentor;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function add(UserRequest $request){

        if ($request['role'] == 'student') {
            $student = new Student();
            $student->fill(
                [
                    'name' => $request->input('name'),
                    'learning_language' => $request['learning_language'],
                    'experience_level' => $request['experience_level'],
                ]
            );
            $student->save();

            $user = new User();
            $user->fill(
                [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                    'role' => $request->input('role'),
                ]
            );
            $user->detail_id = $student->id;
            
            $user->save();

        } if ($request['role'] == 'mentor') {

            $mentor = new Mentor();
            $mentor->fill(
                [
                    'name' => $request->input('name'),
                    'teaching_languages' => $request->input('teaching_languages'),
                    'experience_years' => $request->input('experience_years'),
                    'introduction' => "hogehoge",
                ]
            );
            
            $user = new User();
            $user->fill(
                [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                    'role' => $request->input('role'),
                ]
            );
            $mentor->save();
            $user->detail_id = $mentor->id;
            $user->save();
        };

        return redirect('/sign-in')->with('message', '追加しました');
    }  

}
