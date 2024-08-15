<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MentorRequest;

class MentorController extends Controller
{
    public function getMentors(Request $request){

        $keyword = $request->input('keyword');

        $query = User::query()
            ->where('users.role', '=', 'mentor')
            ->where('users.name', 'LIKE', "%{$keyword}%");
        
        $user = $query->get();
        return view('mentor.mentor', compact('user', 'keyword'));
    }

    public function add(MentorRequest $request){

        $mentors = new Mentor();

        $mentors->name = $request->input('name');
        $mentors->teaching_languages = $request->input('teaching_languages');
        $mentors->experience_years = $request->input('experience_years');
        
        $mentors->save();

        return redirect('/mentor')->with('message', '追加しました');
    }   
    public function edit($id)
    {
        $mentors = Mentor::findOrFail($id);
        $editMode = true;

        return view('mentor/sign-up', compact('mentors', 'editMode'));
    }
    public function update(MentorRequest $request, $id)
    {
        $data = $request->all();
        $mentors = User::findOrFail($id);
        $mentors->name = $data['name'];
        $mentors->teaching_languages = $data['teaching_languages'];
        $mentors->experience_years = $data['experience_years'];
        $mentors->save();

        return redirect('/mentor')->with('message', '編集しました');
    }

    public function destroy($id)
    {
        $mentors = User::findOrFail($id);
        $mentors->delete();
        return redirect('/mentor')->with('message', '削除しました');
    }
    
}
