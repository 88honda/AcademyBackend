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
}
