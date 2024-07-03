<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MentorRequest;
use Illuminate\Support\Facades\DB;

class MentorController extends Controller
{
    public function mentor(Request $request){

        // データベースからユーザー情報を取得
        $keyword = $request->input('keyword');
        $query = Mentor::query();

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }
        $mentors = DB::table('users')
        ->join('mentors', 'users.detail_id', '=', 'mentors.id')
        ->where('users.role', '=', 'mentor')
        ->select('mentors.*', 'users.name', 'users.email')
        ->get();
        return view('/mentor/mentor', compact('mentors', 'keyword'));
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
        $mentors = Mentor::findOrFail($id);
        $mentors->name = $data['name'];
        $mentors->teaching_languages = $data['teaching_languages'];
        $mentors->experience_years = $data['experience_years'];
        $mentors->save();

        return redirect('/mentor')->with('message', '編集しました');
    }

    public function destroy($id)
    {
        $mentors = Mentor::findOrFail($id);
        $mentors->delete();
        return redirect('/mentor')->with('message', '削除しました');
    }
    
}
