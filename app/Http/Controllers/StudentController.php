<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function getStudents(Request $request){

        $keyword = $request->input('keyword');

        $query = User::query()
            ->where('users.role', '=', 'student')
            ->where('users.name', 'LIKE', "%{$keyword}%");
            
        $user = $query->get();
        return view('student.student',compact('user', 'keyword'));
    }

    public function add(StudentRequest $request){

        $students = new Student();
        $students->name = $request['name'];
        $students->learning_language = $request['learning_language'];
        $students->experience_level = $request['experience_level'];
        $students->save();

        $user = new User();
        $user->name = $request['name'];
        $user->email = Str::random(10) . '@example.com';
        $user->password = bcrypt(Str::random(8));
        $user->role = 'student';
        $user->detail_id =  $students->id;
        $user->save();

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

        
        $user = User::find($id);
        $students = Student::find($user->detail_id);
        $students->name = $request['name'];
        $students->learning_language = $request['learning_language'];
        $students->experience_level = $request['experience_level'];

        $students->save();

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->detail_id = $students->id;

        $user->save();

        return redirect()->route('student')->with('message', '編集しました');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $student = Student::find($user->detail_id);
        $student->delete();
        
        return redirect('student')->with('message', '削除しました');
    }
}