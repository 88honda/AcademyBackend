<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    public function student(Request $request){

        // データベースからユーザー情報を取得
        $keyword = $request->input('keyword');
        $query = User::query();

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }

        $user = User::where('users.role', '=', 'student')
        ->get(); 

        return view('/student/student',compact('user', 'keyword'));
    }

    public function add(StudentRequest $request){

        $students = new Student();

        $students->name = $request['name'];
        $students->learning_language = $request['learning_language'];
        $students->experience_level = $request['experience_level'];
        $students->save();

        return redirect('/student')->with('message', '追加しました');
    }   
    public function edit($id)
    {
        $students = User::findOrFail($id);
        $editMode = true;
        $experienceLevels = [
            '' => '---',
            'beginner' => 'beginner',
            'intermediate' => 'intermediate',
            'advanced' => 'advanced',
        ];
        return view('/student/sign-up', compact('students', 'editMode', 'experienceLevels'));
    }
    public function update(StudentRequest $request, $id)
    {
        $data = $request->all();
        $students = User::findOrFail($id);
        $students->name = $data['name'];
        $students->learning_language = $data['learning_language'];
        $students->experience_level = $data['experience_level'];
        $students->save();

        return redirect('/student')->with('message', '編集しました');
    }

    public function destroy($id)
    {
        $students = Student::findOrFail($id);
        $students->delete();
        return redirect('/student')->with('message', '削除しました');
    }
}
