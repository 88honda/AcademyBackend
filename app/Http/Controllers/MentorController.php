<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Mentor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;

class MentorController extends Controller
{
    public function mentor(Request $request){

        // データベースからユーザー情報を取得
        $keyword = $request->input('keyword');
        $query = Mentor::query();

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }
        $mentors = $query->get();
        return view('/mentor', compact('mentors', 'keyword'));
    }

    //
     public function add(StudentRequest $request){

        $mentors = new Student();

        $mentors->name = $request['name'];
        $mentors->teaching_languages = $request['teaching_languages'];
        $mentors->experience_years = $request['experience_years'];
        $mentors->save();

        return redirect('/');
    }   
    // public function edit($id)
    // {
    //     $students = Student::findOrFail($id);
    //     $editMode = true;
    //     $experienceLevels = [
    //         '' => '---',
    //         'beginner' => 'beginner',
    //         'intermediate' => 'intermediate',
    //         'advanced' => 'advanced',
    //     ];
    //     return view('sign-up', compact('students', 'editMode', 'experienceLevels'));
    // }
    public function update(StudentRequest $request, $id)
    {
        $data = $request->all();
        $students = Student::findOrFail($id);
        $students->name = $data['name'];
        $students->learning_language = $data['learning_language'];
        $students->experience_level = $data['experience_level'];
        $students->save();

        return redirect('/');
    }

    // public function destroy($id)
    // {
    //     $students = Student::findOrFail($id);
    //     $students->delete();
    //     return redirect('/')->with('message', '削除しました');
    // }
}
