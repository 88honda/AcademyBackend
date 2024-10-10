<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use App\Models\Mentor;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use App\Http\Requests\UserRequest;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(UserRequest $request): RedirectResponse
    {
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
            $detail_id = $student->id;

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->password),
                'role' => 'student', 
                'detail_id' => $detail_id,
            ]);
            $user->save();

        } else if ($request['role'] == 'mentor') {
            $mentor = new Mentor();
            $mentor->fill(
                [
                    'name' => $request->input('name'),
                    'teaching_languages' => $request->input('teaching_languages'),
                    'experience_years' => $request->input('experience_years'),
                    'introduction' => "hogehoge",
                ]
            );
            $mentor->save();
            $detail_id = $mentor->id;
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->password),
                'role' => 'mentor',
                'detail_id' => $detail_id,
            ]);
            $user->save();
        };
            
        return redirect('/login')->with('message', '追加しました');
    }
}
