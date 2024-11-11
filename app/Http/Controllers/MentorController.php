<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MentorRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class MentorController extends Controller
{
    public function showMentorList(Request $request){

        $keyword = $request->input('keyword');
        $users = User::with('mentor')
            ->where('users.role', 'mentor')
            ->get();

        return view('mentor.mentor', compact('keyword', 'users'));
    }

    public function add(MentorRequest $request){
        $mentors = new Mentor();
        $mentors->name = $request->input('name');
        $mentors->teaching_languages = $request->input('teaching_languages');
        $mentors->experience_years = $request->input('experience_years');
        $mentors->save();

        $user = new User();
        $user->name = $request['name'];
        $user->email = Str::random(10) . '@example.com';
        $user->password = bcrypt(Str::random(8));
        $user->role = 'mentor';
        $user->detail_id =  $mentors->id;
        $user->save();

        return redirect('/mentor')->with('message', '追加しました');
    }   
    public function edit($id)
    {
        $mentors = User::findOrFail($id);
        $editMode = true;

        return view('mentor/sign-up', compact('mentors', 'editMode'));
    }
    public function update(MentorRequest $request, $id)
    {
        $user = User::find($id);
        $mentor = Mentor::find($user->detail_id);
        $mentor->name = $request['name'];
        $mentor->teaching_languages = $request['teaching_languages'];
        $mentor->experience_years = $request['experience_years'];

        $mentor->save();

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->detail_id = $mentor->id;

        $user->save();
        return redirect()->route('mentor')->with('message', '編集しました');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        
        User::destroy($id);
        Mentor::destroy($user->detail_id);

        return redirect('mentor')->with('message', '削除しました');
    }
    
}
