<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

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

    public function add(Request $request){

        $students = new Student();
        $inputs = $request->validate([
            'name' => 'required',  
            'learning_language' => 'required',   
            'experience_level' => 'required',   
        ]);

        // $students->name = $request['name'];
        $students->name = $inputs['name'];
        $students->learning_language = $inputs['learning_language'];
        $students->experience_level = $inputs['experience_level'];
        $students->save();

        return redirect('/')->back()->with('success', 'Form submitted successfully!');
    }   
    public function edit($id)
    {
        $students = Student::findOrFail($id);
        $editMode = true;
        return view('sign-up', compact('students', 'editMode'));
    }
    public function update(Request $request, $id)
    {
        $inputs = $request->validate([
            'name' => 'required',  
            'learning_language' => 'required',   
            'experience_level' => 'required',   
        ]);

        $data = $request->all();
        $students = Student::findOrFail($id);
        $students->name = $inputs['name'];
        $students->learning_language = $inputs['learning_language'];
        $students->experience_level = $inputs['experience_level'];
        $students->save();

        return redirect('/');
    }
}
