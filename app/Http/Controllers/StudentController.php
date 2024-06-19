<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    public function index(Request $request){

        // データベースからユーザー情報を取得
        $keyword = $request->input('keyword');
        $query = Student::query();

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }
        $students = $query->get();
        return view('index', compact('students', 'keyword'));
    }

    public function add(StudentRequest $request){

        $students = new Student();

        $students->name = $request['name'];
        $students->learning_language = $request['learning_language'];
        $students->experience_level = $request['experience_level'];
        $students->save();

        return redirect('/');
    }   
    public function edit($id)
    {
        $students = Student::findOrFail($id);
        $editMode = true;
        return view('sign-up', compact('students', 'editMode'));
    }
    public function update(StudentRequest $request, $id)
    {
        $inputs = $request->validate([
            'name' => 'required',
            'learning_language' => 'required',
            'experience_level' => 'required',
        ]);
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
    //     // 指定されたIDのユーザーを検索
    //     $user = Student::findOrFail($id);

    //     // ユーザーを削除
    //     $user->delete();

    //     // 成功レスポンスを返す
    //     return response()->json(['message' => 'User deleted successfully'], 200);
    // }
}
